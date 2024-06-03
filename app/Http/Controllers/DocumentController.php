<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentAccess;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function createDocument(Request $request)
    {
        //validate the request
        $request->validate([
            'document' => 'required|file',
            'category' => 'required|string',
            'share_with' => 'nullable|array'
        ]);

        //add appropriate file extension
        $document = $request->file('document');
        $request['document_name'] = $request['document_name'] . '.' . $document->extension();

        //check for duplicate filename
        $request->validate([
            'document_name' => 'required|string|unique:documents,file_name',
        ]);

        //store the file
        $request->file('document')->storeAs('documents/'.$request->category.'/', $request['document_name'], 's3');

        //create the DB Document record for the file
        $createdDocument = Document::create([
            "owner_id" => auth()->user()->id,
            "file_name" => $request['document_name'],
            "category" => $request->category
        ]);

        //give access to the file, if shared with anyone
        if ($request->share_with) {
            for ($i = 0; $i < count($request->share_with); $i++) {
                $user_id = $request->share_with[$i];

                DocumentAccess::create([
                    "user_id" => $user_id,
                    "document_id" => $createdDocument->id,
                    "access_type" => "read"
                ]);
            }
        }

        //return to the page with success message
        return redirect()->back()->with('success', 'File added successfully');
    }

    public function showMyDocuments(Request $request)
    {
        $ownedDocuments=auth()->user()->ownedDocuments;

        $accessibleDocuments = [];
        foreach (auth()->user()->documentAccesses as &$documentAccess) {
            array_push($accessibleDocuments, $documentAccess->document);
        }

        return view('myDocuments',[
            "ownedDocuments" => $ownedDocuments,
            "accessibleDocuments" => $accessibleDocuments
        ]);
    }
}
