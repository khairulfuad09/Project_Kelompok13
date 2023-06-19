<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['user'] = DB::table('users')->where('id_status', 'usr')->get();
        return view('admin.dataUser', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|min:1',
            'email' => 'required|unique:users',
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
            return redirect('/user');
        } else {
            return back()->with('error', 'Gagal Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['user'] = DB::table('users')->where('id', $id)->first();
        return view('admin.updateUser', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $query = DB::table('users')->where('id', $id)->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'id_status' => $request->id_status
        ]);
        if ($query) {
            return redirect('/user');
        } else {
            return redirect('/user');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = DB::table('users')->where('id', $id)->delete();
        if ($query) {
            return redirect('/user');
        } else {
            return redirect('/user');
        }
    }
}
