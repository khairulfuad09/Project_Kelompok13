<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pesanans'] = DB::table('orders')
            ->join('products', 'orders.id_product', 'products.id_product')
            ->select('orders.*', 'products.*')
            ->where('products.email', auth()->user()->email)
            ->paginate(10);
        $data['products'] = DB::table('products')->where('email', auth()->user()->email)->count();
        return view('penjual.pesanan', $data);
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
        //
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
    public function edit(Order $order)
    {
        //
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
            return redirect('/pesanan');
        } else {
            return redirect('/pesanan');
        }
    }
}
