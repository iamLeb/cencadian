<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        Auth::user()->update($request->all());
        return redirect()->route('home')->with('success', 'Profile Saved, Please Start Your Application');
    }

    public function updateCompany(Request $request)
    {
        auth()->user()->update($request->all());
        return redirect()->back()->with('success', 'Profile Updated');
    }

}
