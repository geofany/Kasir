<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Toko;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo Auth::user()->id;
        $userData = User::with('tokos')-> where('id', Auth::user()->id)->firstOrFail();
        return view('profile', compact('userData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $userData = User::where('id', Auth::user()->id)->firstOrFail();
      return view('editPicture', compact('userData'));
    }

    public function storePicture(Request $request)
    {
      $file = $request->file('pic');
      if ($file != null) {
        $filename = $file->getClientOriginalName();
        $path = 'img/';
        $file->move($path, $filename);


        $folder = url("/img\/");
        $location = $folder.$filename;

        Toko::where('user_id', Auth::user()->id)->update(['logo_toko' =>  $location]);

        return redirect()->route('profile.index');
      } else {
        $defaultPic = url('/img/logo.png');
        Toko::where('user_id', Auth::user()->id)->update(['logo_toko' =>  $defaultPic]);
        return redirect()->route('profile.index');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $user_id = Auth::user()->id;
      User::where('id', $user_id)->update(['name' => $request->name, 'email' => $request->email, 'hp' => $request->hp]);
      Toko::where('user_id', $user_id)->update(['name' => $request->nameToko, 'alamat' => $request->alamat]);
      return redirect()->route('profile.index');
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

    public function editProfile()
    {
      $userData = User::with('tokos')-> where('id', Auth::user()->id)->firstOrFail();
      return view('editProfile', compact('userData'));
    }

    public function changePassword(Request $request)
    {
      if (Hash::check($request->old_password, Auth::user()->password)) {
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();
        $message="Password Berhasil Diubah";
        return view('changePassword', compact('message'));
      }
    }

    public function changePw()
    {
      return view('changePassword');
    }
}
