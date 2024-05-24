<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PdfController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function showForm($id)
    {
        $user = User::where('id', $id)->first();
        $userInfo = [
            'id' => $id,
            'name' => $user->name,
            'email' => $user->email,
            'address' => $user->address
        ];
        return view('admin/intern/pdf/form', $userInfo);
    }

    public function generatePdf(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        $userInfo = [
            'name' => $user->name,
            'email' => $user->email,
            'address' => $user->address,
            'position' => $request['type'],
            'startDate' => $request['startDate'],
            'endDate' => $request['endDate'],
            'reportingTo' => $request['reportingTo'],
            'location' => $request['location']
        ];

        $pdf = Pdf::loadView('admin/intern/pdf/pdf_template', $userInfo);
        // Return PDF as download
        return $pdf->download('generated_pdf.pdf');
    }
}
