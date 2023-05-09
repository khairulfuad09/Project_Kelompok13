<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class loginController extends Controller
{
    public function index()
    {
        // return view('dashboard');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('LoginError', 'Login Gagal');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|min:5',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3',
            'alamat' => 'required',
            'id_status' => 'required',
        ]);
        $query = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'id_status' => $request->id_status,
        ]);
        if ($query) {
            return redirect('/sign');
        } else {
            return back()->with('error', 'Gagal Menambahkan Data');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/sign');
    }
}
