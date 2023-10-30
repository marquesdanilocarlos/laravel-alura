<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->except('_token'))) {
            return redirect()->back()->withErrors(['Usuário ou senha inválidos!']);
        };

        return redirect()->intended();
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        return redirect()->route('login');
    }
}
