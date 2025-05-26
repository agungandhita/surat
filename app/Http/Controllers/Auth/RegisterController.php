<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.Register.register');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6'
        ]);

        // Menyesuaikan nama field dengan model User
        $user = new User();
        $user->name = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        // Tampilkan pesan sukses
        Alert::success('Berhasil', 'Akun berhasil dibuat!');

        // Redirect ke halaman login
        return redirect()->route('login');
    }
}
