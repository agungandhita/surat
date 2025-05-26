<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.Login.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            Alert::success('Berhasil', 'Login berhasil!');

            // Redirect berdasarkan role user
            if (Auth::user()->role === 'admin') {
                return redirect('/admin');
            }

            return redirect('/');
        }

        Alert::error('Gagal', 'Email atau password salah!');

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::success('Berhasil', 'Anda telah logout!');

        return redirect('/');
    }
}
