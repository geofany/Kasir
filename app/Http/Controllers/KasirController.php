<?php

namespace App\Http\Controllers;

use App\Nota;
use App\Nota_detail;
use Illuminate\Http\Request;
use Auth;
use App\Toko;
use App\Produk;
use PhpParser\Node\Stmt\Foreach_;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nota_details = Nota_detail::where('id',0)->get();
        // $nota = Nota::where('id',0)->first();
        $toko = Toko::where('user_id', Auth::user()->id)->firstOrFail();
        $barang = Produk::where('toko_id', $toko->id)->get();
        return view('kasir', compact('barang','toko', 'nota_details'));
    }

    public function ajaxbarang($id)
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->total_bayar);
        $nota = new Nota;
        $toko = Toko::where('user_id', Auth::user()->id)->first();
        $total = $request->total_bayar - $request->total_kembalian;
        // dd($request);
        $total2 = 0;
        for ($id = 0; $id < count($request->product_id); $id++) {
            $produk = Produk::where('id', $request->product_id[$id])->first();
            $modal = $produk->harga_beli * $request->qty[$id];
            $total2 = $total2 + $modal;
        }
        $keuntungan = $total - $total2;
        $nota->toko_id = $toko->id;
        $nota->total_bayar = $request->total_bayar;
        $nota->total_kembalian = $request->total_kembalian;
        $nota->total_keuntungan = $keuntungan;
        $nota->save();
        for ($id = 0; $id < count($request->product_id); $id++) {
            $nota_detail = new Nota_detail;
            $nota_detail->create([
                'nota_id' => $nota->id,
                'produk_id' => $request->product_id[$id],
                'qty' => $request->qty[$id],
                'total' => $request->amount[$id]
            ]);
        }

        $barang = Produk::where('toko_id', Auth::user()->tokos->id)->get();
        $nota_details = Nota_detail::where('nota_id', $nota->id)->get();
        $toko = Toko::where('user_id', Auth::user()->id)->firstOrFail();
        return view('kasir', compact('barang','nota_details','toko','nota'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
