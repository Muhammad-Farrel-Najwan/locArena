<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('customer.home');
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'nama_depan' => ['required', 'string', 'max:50'],
            'nama_belakang' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'no_telepon' => ['nullable', 'string', 'max:20'],
            'jenis_kelamin' => ['nullable', 'in:L,P'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = users::create([
            'nama_depan' => $data['nama_depan'],
            'nama_belakang' => $data['nama_belakang'] ?? null,
            'email' => $data['email'],
            'no_telepon' => $data['no_telepon'] ?? null,
            'jenis_kelamin' => $data['jenis_kelamin'] ?? null,
            'password' => Hash::make($data['password']),
            'role' => 'customer',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('customer.home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
