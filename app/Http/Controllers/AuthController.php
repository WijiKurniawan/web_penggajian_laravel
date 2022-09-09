<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/user/' . auth()->user()->id);
        }

        return back()->with('error', 'Email atau password yang Anda masukkan salah.');
    }

    public function logout()
    {
        Auth::logout();

        \request()->session()->invalidate();
        \request()->session()->regenerateToken();

        return redirect('/login');
    }

    public function create() {
        return view('auth.register', [
            'title' => 'Buat Akun',
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name'      => 'required|max:255',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|max:255',
        ]);

        User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Akun Anda telah berhasil dibuat. Silahkan login!');
    }
}
