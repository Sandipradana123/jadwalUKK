<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'email wajib diisi.',
                'email.email' => 'format email salah',
                'password.required' => 'password wajib diisi.',
            ],
        );

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan']);
        }

        // dd($user);
        if ($user && $request->password === $user->password) {
            Auth::login($user);

            // Cek kategori
            if ($user->kategori === 'admin') {
                return redirect()->route('admin-ukk'); // Arahkan ke halaman admin
            } elseif ($user->kategori === 'user') {
                return redirect()->route('pendaftaran-ukk'); // Arahkan ke halaman user
            } else {
                return redirect()->route('login')->withErrors('Kategori tidak valid');
            }
        } else {
            return back()->withErrors('Email atau password salah');
        }
    }
}
