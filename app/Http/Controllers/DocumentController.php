<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentAccess;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class DocumentController extends Controller
{
    public function showAddEmployeeDocuments(Request $request)
    {
        //get employees (hired, admin, superadmin) not including self.
        $employees = DB::table('users')
        ->where(function (Builder $query) {
            $query->where('type', 'hired')
            ->orWhere('type', 'admin')
            ->orWhere('type', 'super_admin');
        })
        ->whereNot('id', auth()->user()->id)
        ->get();

        return view('addEmployeeDocuments', [
            "employees" => $employees
        ]);
    }

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

    public function showManageDocument(Request $request)
    {
        $document = Document::where('id', $request->id)->first();

        if (!$document) {
            return redirect()->back()->with('error', 'Document not found');
        }

        if ($document->owner_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        //get employees (hired, admin, superadmin) not including self.
        $employees = DB::table('users')
        ->where(function (Builder $query) {
            $query->where('type', 'hired')
            ->orWhere('type', 'admin')
            ->orWhere('type', 'super_admin');
        })
        ->whereNot('id', auth()->user()->id)
        ->get();

        $employeesWithAccess = [];
        foreach ($document->documentAccesses as &$documentAccess) {
            array_push($employeesWithAccess, $documentAccess->user_id);
        }

        return view('admin/manageDocument', [
            "document" => $document,
            "employeesWithAccess" => $employeesWithAccess,
            "employees" => $employees
        ]);
    }

    public function updateDocumentAccess(Request $request) {
        $request->validate([
            "id" => "exists:documents,id",
            "share_with" => "nullable|array"
        ]);

        //share_with should be an empty array if passed as null.
        if (!$request->share_with) $request->share_with = [];

        $document = Document::where('id', $request->id)->first();

        $existingAccesses = $document->documentAccesses;

        //delete existing accesses that are not in the share_with array
        foreach ($existingAccesses as &$existingAccess) {
            if (!in_array($existingAccess->user_id, $request->share_with)) {
                $existingAccess->delete();
            }
        }

        //add new accesses that do not currently exist
        foreach ($request->share_with as $user_id) {

            if (!DocumentAccess::where('document_id', $request->id)->where('user_id', $user_id)->exists()) {
                DocumentAccess::create([
                    "user_id" => $user_id,
                    "document_id" => $request->id,
                    "access_type" => "read"
                ]);
            }

        }

        return redirect()->route('my.documents')->with('success', 'Document access updated successfully');
    }


}
