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
            'address' => 'required',
            'relationship' => 'required'
        ]);

        auth()->user()->emergency()->count() ? (
            auth()->user()->emergency()->update([
                'name' => $request->name,
                'email' => $request->email,
                'pphone' => $request->pphone,
                'sphone' => $request->sphone,
                'relationship' => $request->relationship,
                'address' => $request->address,
                'note' => $request->note,
            ])
        ) : (
            auth()->user()->emergency()->create($request->all())
        );

        return redirect()->back()->with('success', 'Emergency Contact Stored');

    }

}
