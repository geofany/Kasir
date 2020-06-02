<?php

namespace App\Http\Controllers;
use App\Nota;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->roles === 0) {
            $user = User::whereDate('created_at', Carbon::today())->orderBy('created_at', 'DESC')->get();
            return view('home', compact('user'));
        } else {
            $nota = Nota::where('toko_id', Auth::user()->tokos->id)->whereDate('created_at', Carbon::today())->orderBy('created_at', 'DESC')->get();
            return view('home', compact('nota'));
        }



    }
}
