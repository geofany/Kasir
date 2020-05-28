<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Toko;
use App\User;
use App\Produk;
use Auth;
use Redirect;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toko = Toko::where('user_id', Auth::user()->id)->firstOrFail();
        $barang = Produk::where('toko_id', $toko->id)->get();
        return view('barang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahBarang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $toko = Toko::where('user_id', Auth::user()->id)->firstOrFail();

      $barang = new Produk;
      $barang->toko_id = $toko->id;
      $barang->name = $request->name;
      $barang->harga_beli = $request->harga_beli;
      $barang->harga_jual = $request->harga_jual;
      $barang->stock = $request->stock;

      $barang->save();
      $message="Barang Berhasil Ditambahkan";
      return view('tambahBarang',compact('message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $barang = Produk::where('id', $id)->firstOrFail();
      return view('editBarang', compact('barang'));
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
      $barang = Produk::find($id);

      $barang->name = $request->name;
      $barang->harga_beli = $request->harga_beli;
      $barang->harga_jual = $request->harga_jual;
      $barang->stock = $request->stock;
      $barang->save();
      $message="Barang Berhasil Diedit";
      return view('editBarang',compact('message', 'barang'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produk::find($id)->delete();
        $toko = Toko::where('user_id', Auth::user()->id)->firstOrFail();
        $barang = Produk::where('toko_id', $toko->id)->get();
        $message="Barang Berhasil Dihapus";
        return view('barang', compact('message', 'barang'));
    }
}
