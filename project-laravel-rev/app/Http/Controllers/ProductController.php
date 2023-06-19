<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $email = auth()->user()->email;
        $data['email'] = $email;
        $data['product'] = DB::table('products')->where('email', $email)->paginate(10);
        $data['orders'] = DB::table('orders')->join('products', 'orders.id_product', 'products.id_product')->select('orders.*', 'products.*')->where('products.email', auth()->user()->email)->count();
        return view('penjual.Product', $data);
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
            'namaproduk' => 'required',
            'jenisproduk' => 'required',
            'stok' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png',
            'harga' => 'required',
            'deskripsi' => 'required',
            'email' => 'required',
        ]);


        if ($request->hasfile('image')) {
            $image = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
            $request->file('image')->move(public_path('img'), $image);
        }
        $query = Product::create([
            'namaproduk' => $request->namaproduk,
            'jenisproduk' => $request->jenisproduk,
            'stok' => $request->stok,
            'image' => $image,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'email' => $request->email,
        ]);
        if ($query) {
            return redirect('/product');
        } else {
            // return back()->with('error', 'Gagal Menambahkan Data');
            return redirect('/product');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['product'] = DB::table('products')->where('id_product', $id)->first();
        return view('penjual.editProduct', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->hasfile('image')) {
            $image = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
            $request->file('image')->move(public_path('img'), $image);

            $query = DB::table('products')->where('id', $id)->update([
                'namaproduk' => $request->namaproduk,
                'jenisproduk' => $request->jenisproduk,
                'stok' => $request->stok,
                'image' => $image,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'email' => $request->email,
            ]);
        } else {
            $query = DB::table('products')->where('id_product', $id)->update([
                'namaproduk' => $request->namaproduk,
                'jenisproduk' => $request->jenisproduk,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'email' => $request->email,
            ]);
        }

        if ($query) {
            return redirect('/product');
        } else {
            return redirect('/product');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = DB::table('products')->where('id_product', $id)->delete();
        if ($query) {
            return redirect('/product');
        } else {
            return redirect('/product');
        }
    }
    public function cart()
    {
        // dd(session('cart'));
        return view('user.cart');
    }
    public function addCart(string $id)
    {
        // $product = Product::findOrFail($id);
        $product = DB::table('products')->where('id_product', $id)->first();
        $cart = session()->get('cart', []);

        // print_r($product);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id_produk" => $product->id_product,
                "product_name" => $product->namaproduk,
                "photo" => $product->image,
                "price" => $product->harga,
                "quantity" => 1
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back();
    }
}
