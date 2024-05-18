<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
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

    public function updateContact(Request $request)
    {
        if(auth()->user()->contact) {
            auth()->user()->contact()->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
        } else {
            auth()->user()->contact()->create($request->all());
        }

        return redirect()->back()->with('success', 'Contact information updated');
    }
}
