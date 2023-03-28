<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('main.bootstrap');
    }

    public function login()
    {
        return view('pages.login');
    }
    public function auth(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->intended('');
        }

        return redirect()->back()->with('eror', 'Email / password salah.');
    }
}
