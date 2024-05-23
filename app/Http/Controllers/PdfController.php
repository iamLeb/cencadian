<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function showForm()
    {
        return view('admin.intern.pdf');
    }

    public function generatePdf(Request $request)
    {
        // code here
    }
}
