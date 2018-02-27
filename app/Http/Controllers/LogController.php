<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(request $request)
    {
        $data = $request->validate([
            'email' => 'required | email',
            'password' => 'required',
        ]);
        if (Auth::attempt($data)) {
            return redirect()->route('home');
        }

        return 'bye';
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
