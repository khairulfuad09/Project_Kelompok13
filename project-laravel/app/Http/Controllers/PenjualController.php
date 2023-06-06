<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Util\Str;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PenjualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data['penjual'] = DB::table('users')->where('id_status', 'pnj')->get();
        // return view('admin.dataPenjual', $data);
        return view('penjual.Product', [
            'post' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validateData = $request->validate([
            'namaproduk' => 'required|max:50',
            'jenisproduk' => 'required|',
            'stok' => 'required',
            'image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        if($request->file('image')){
            $validateData['image']=$request->file('image')->store('post-image');
        }

        $namaproduk = $request->input('namaproduk');
        $jenisproduk = $request->input('jenisproduk');
        $stok = $request->input('stok');
        $image = $request->file('image')->store('post-image');
        $hargaproduk = $request->input('hargaproduk');
        $deskripsi = $request->input('deskripsi');

        $query = DB::table('product')->insert([
            'namaproduk' => $namaproduk,
            'jenisproduk' => $jenisproduk,
            'stok' => $stok,
            'image' => $image,
            'hargaproduk' => $hargaproduk,
            'deskripsi' => $deskripsi,
        ]);

        if ($query) {
            return redirect()->route('Product.read')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('Product.read')->with('failed', 'Data Gagal Ditambahkan');
        }
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'username' => 'required|min:3',
    //         'email' => 'required|unique:users',
    //         'password' => 'required|min:3',
    //         'alamat' => 'required',
    //         'id_status' => 'required',
    //     ]);
    //     $query = User::create([
    //         'username' => $request->username,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //         'alamat' => $request->alamat,
    //         'id_status' => $request->id_status,
    //     ]);
    //     if ($query) {
    //         return redirect('/penjual');
    //     } else {
    //         return back()->with('error', 'Gagal Menambahkan Data');
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(product $products)
    {
        $data['products'] = DB::table('products')->paginate(10);
        return view('Product',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $products, string $id)
    {
        $data['products'] = DB::table('products')->where('id', $id)->first();
        return view('Product',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'namaproduk' => 'required|max:50',
            'jenisproduk' => 'required|',
            'stok' => 'required',
            'image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        if($request->file('image')){
            $validateData['image']=$request->file('image')->store('post-image');
        }

        $namaproduk = $request->input('namaproduk');
        $jenisproduk = $request->input('jenisproduk');
        $stok = $request->input('stok');
        $image = $request->file('image')->store('post-image');
        $hargaproduk = $request->input('hargaproduk');
        $deskripsi = $request->input('deskripsi');

        $query = DB::table('products')->where('id', $id)->update([
            'namaproduk' => $namaproduk,
            'jenisproduk' => $jenisproduk,
            'stok' => $stok,
            'image' => $image,
            'hargaproduk' => $hargaproduk,
            'deskripsi' => $deskripsi,
        ]);

        if ($query) {
            return redirect()->route('Product.read')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('Product.read')->with('failed', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = DB::table('products')->where('id', $id)->delete();
        if ($query) {
            return redirect()->route('Product.read')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('Product.read')->with('failed', 'Data Gagal Dihapus');
        }
    }
}
