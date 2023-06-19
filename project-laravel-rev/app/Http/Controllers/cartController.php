<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data['orders'] = DB::table('orders')->paginate(10);
        $data['orders'] = DB::table('orders')
            ->join('products', 'orders.id_product', 'products.id_product')
            ->select('orders.*', 'products.*')->where('orders.email', auth()->user()->email)->paginate(10);
        return view('user.order', $data);
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
        // dd(session('cart'));
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'nomor' => 'required',
        ]);
        foreach ((array) session('cart') as $id => $details) {
            $order = Order::create([
                'username' => $request->username,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'nomor' => $request->nomor,
                'id_product' => $details['id_produk'],
                'jumlah_pesanan' => $details['quantity'],
                'total_harga' => $request->total_harga,
                'status' => $request->status,
            ]);
        }
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to truefor Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;


        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_harga,
            ),
            'customer_details' => array(
                'name' => $request->username,
                'phone' => $request->nomor
            ),
        );

        $data['orders'] = DB::table('orders')
            ->join('products', 'orders.id_product', 'products.id_product')
            ->select('orders.*', 'products.*')->where('orders.email', auth()->user()->email)->paginate(10);

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $snap = session()->get('snap', []);

        // if(isset($snapToken)){
        //     $snap['snapToken'] = $snapToken;
        // }else{

        // }
        $snap['snapToken'] = $snapToken;



        session()->put('snap', $snap);

        // $data['snapToken'] = $snapToken;
        return view('user.order', compact('snapToken', 'order'), $data);
        // return redirect('/order');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['product'] = DB::table('products')->where('id_product', $id)->first();
        return view('produk');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = DB::table('orders')->where('id', $id)->delete();
        if ($query) {
            return redirect('/order');
        } else {
            return redirect('/order');
        }
    }
}
