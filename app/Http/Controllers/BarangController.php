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
        $barang = Produk::where('toko_id', $toko->id)->orderBy('created_at', 'DESC')->get();
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
        $barange = Produk::where('toko_id', $toko->id)->get();
        $masuk = true;
        if (Auth::user()->roles === 1 && count($barange) >= 20) {
          $message = "Anda Sudah Melampaui Batas Jumlah Barang Untuk User Non Premium";
        } else {
          foreach ($barange as $baranges) {
              if ($baranges->name === $request->name) {
                  $masuk = false;
                  break;
              }
          }
          if ($masuk) {
              $barang = new Produk;
              $barang->toko_id = $toko->id;
              $barang->name = $request->name;
              $barang->harga_beli = $request->harga_beli;
              $barang->harga_jual = $request->harga_jual;
              $barang->stock = $request->stock;

              $barang->save();
              $message="Barang Berhasil Ditambahkan";
          } else {
              $message="Barang Dengan Nama ".$request->name." Sudah Ada!";
          }
        }

        return view('tambahBarang', compact('message'));
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
        $toko = Toko::where('user_id', Auth::user()->id)->firstOrFail();
        $barang = Produk::where('id', $id)->firstOrFail();
        if ($barang->toko_id == $toko->id) {
            return view('editBarang', compact('barang'));
        } else {
          $barang = Produk::where('toko_id', $toko->id)->get();
          return redirect()->route('barang.index', compact('barang'));
        }
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
        return view('editBarang', compact('message', 'barang'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $toko = Toko::where('user_id', Auth::user()->id)->firstOrFail();
        $barange = Produk::find($id);
        if ($barange->toko_id === $toko->id) {
            $barange->delete();
            $message="Barang Berhasil Dihapus";
            $barang = Produk::where('toko_id', $toko->id)->get();
            return view('barang', compact('message', 'barang'));
        } else {
          $barang = Produk::where('toko_id', $toko->id)->get();
            return redirect()->route('barang.index', compact('barang'));
        }
    }
}
