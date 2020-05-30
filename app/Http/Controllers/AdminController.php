<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Premium;
use App\Toko;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('roles', '!=', 0)->get();
        return view('listUser', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $premiums = Premium::where('approve', 0)->with('users')->get();
        return view('requestPremium', compact('premiums'));
    }

    public function approve($id)
    {
      $premium = Premium::find($id);
      $premium->approve = 1;
      $premium->save();

      $user = User::find($premium->user_id);
      $user->roles = 2;
      $user->save();

      $premiums = Premium::where('approve', 0)->with('users')->get();
      $message="User Berhasil Diupgrade";
      return view('requestPremium', compact('premiums', 'message'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
