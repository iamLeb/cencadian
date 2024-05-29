<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function profileUpdate(Request $request)
    {
        dd($request->all());
        Auth::user()->update($request->all());
        return redirect()->route('home')->with('success', 'Profile Saved, Please Start Your Application');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
            'new_password_confirmation' => 'required'
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return redirect()->route('profile')->with('error', 'Incorrect old password');    
        } 

        Auth::user()->update([
            "password" => Hash::make($request->new_password)
        ]);

        return redirect()->route('profile')->with('success', 'Password updated successfully');
    }

    public function updateCompany(Request $request)
    {
        auth()->user()->update($request->all());
        return redirect()->back()->with('success', 'Profile Updated');
    }

}
