<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $id_user = auth()->user()->id;
        $data['profile'] = DB::table('users')->where('id', $id_user)->first();
        return view('profile', $data);
    }
    public function update(Request $request, string $id)
    {
        // if ($request->hasfile('image')) {
        //     $image = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
        //     $request->file('image')->move(public_path('img'), $image);

        $query = DB::table('users')->where('id', $id)->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'alamat' => $request->alamat,
            'id_status' => $request->id_status,
        ]);
        // } else {
        // $query = DB::table('products')->where('id_product', $id)->update([
        //     'namaproduk' => $request->namaproduk,
        //     'jenisproduk' => $request->jenisproduk,
        //     'stok' => $request->stok,
        //     'harga' => $request->harga,
        //     'deskripsi' => $request->deskripsi,
        //     'email' => $request->email,
        // ]);
        // }

        if ($query) {
            return redirect('/profile');
        } else {
            return redirect('/profile');
        }
    }
}
