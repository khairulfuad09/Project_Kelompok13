<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['penjual'] = DB::table('users')->where('id_status', 'pnj')->get();
        return view('admin.dataPenjual', $data);
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
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
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
            return redirect('/penjual');
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
    public function edit(User $user, string $id)
    {
        $data['user'] = DB::table('users')->where('id', $id)->first();
        return view('admin.updatePenjual', $data);
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
            return redirect('/penjual');
        } else {
            return redirect('/penjual');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, string $id)
    {
        $query = DB::table('users')->where('id', $id)->delete();
        if ($query) {
            return redirect('/penjual');
        } else {
            return redirect('/penjual');
        }
    }
}
