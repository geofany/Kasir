<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Premium;
use Auth;

class PremiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('premium');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uploadPremium');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $file = $request->file('bukti');
      if ($file != null) {
        $filename = $file->getClientOriginalName();
        $path = 'img/bukti/';
        $file->move($path, $filename);


        $folder = url("/img/bukti\/");
        $location = $folder.$filename;

        $bukti = new Premium;
        $bukti->user_id = Auth::user()->id;
        $bukti->bukti_bayar = $location;
        $bukti->approve = 0;
        $bukti->save();
        $message="Bukti Berhasil Diunggah";
}
        return view('uploadPremium', compact('message'));
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
