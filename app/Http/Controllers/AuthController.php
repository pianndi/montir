<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:5'
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            return redirect('/dashboard')->with('success', 'Login Berhasil');
        } else {
            return back()->withErrors(['login' => 'Username atau password salah'])->with('error', 'Username atau password salah')->withInput();
        }
        return view('pages.login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout success');
    }
}
