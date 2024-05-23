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
        $userId = User::where('id', $id)->first();

        $data = [
            'user_id' => $userId,
        ];

        $pdf = Pdf::loadView('admin/intern/pdf/pdf_template', $data);
        // Return PDF as download
        return $pdf->download('generated_pdf.pdf');

    }
}
