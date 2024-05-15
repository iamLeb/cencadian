<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{

    public function interview()
    {
        return view('admin.templates.interview');
    }
}
