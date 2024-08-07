<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SesiController extends Controller
{
    function showLoginForm()
    {
        return view('login');
    }
    function login(Request $request)
    { 

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'

        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            $user = Auth::user(); // Dapatkan informasi pengguna yang berhasil login
            Session::put('user_role', $user->role); // Simpan hak akses pengguna dalam sesi

            if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            } elseif (Auth::user()->role == 'user') {
                return redirect('/base');
            }
            
        } else {
            return redirect('')->with('failed', 'Username dan password yang dimasukkan tidak sesuai');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('')->with('success', 'Berhasil logout!');
    }

}
