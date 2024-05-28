<?php

namespace App\Http\Controllers;

use App\Models\Emergency;
use Illuminate\Http\Request;

class HiredInternController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'checkUser']);
    }
    public function storeEmergencyContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'pphone' => 'required',
            'address' => 'required'
        ]);

        return "processing";

    }
}
