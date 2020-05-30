<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {

         $date = DB::table('nota_details')
             ->join('notas', 'nota_details.nota_id', '=', 'notas.id')
             ->selectRaw('DATE(nota_details.created_at) date,sum(nota_details.qty) as sum')
             ->where('notas.toko_id', Auth::user()->tokos->id)
             ->groupBy('date')->orderBy('date', 'desc')
             ->limit(5)
             ->get();
         $month  = DB::table('nota_details')
             ->join('notas', 'nota_details.nota_id', '=', 'notas.id')
             ->selectRaw('MONTH(nota_details.created_at) month,sum(nota_details.qty) as sum')
             ->where('notas.toko_id', Auth::user()->tokos->id)
             ->groupBy('month')->orderBy('month', 'desc')
             ->limit(5)
             ->get();

         $profitdate = DB::table('notas')
             ->selectRaw('DATE(created_at) date,sum(total_keuntungan) as sum')->where('toko_id', Auth::user()->tokos->id)
             ->groupBy('date')->orderBy('date', 'desc')
             ->limit(5)
             ->get();
         $profitmonth = DB::table('notas')
             ->selectRaw('MONTH(created_at) month,sum(total_keuntungan) as sum')->where('toko_id', Auth::user()->tokos->id)
             ->groupBy('month')->orderBy('month', 'desc')
             ->limit(5)
             ->get();

         $mostdate = DB::table('nota_details')
             ->join('notas', 'nota_details.nota_id', '=', 'notas.id')
             ->join('produks', 'nota_details.produk_id', '=', 'produks.id')
             ->selectRaw('produks.name,sum(qty) as sum')
             ->where('notas.toko_id', Auth::user()->tokos->id)
             ->whereDate('nota_details.created_at', Carbon::now()->toDateString())
             ->groupBy('produks.name')->orderBy('sum', 'desc')
             ->limit(5)
             ->get();
         $mostmonth = DB::table('nota_details')
             ->join('notas', 'nota_details.nota_id', '=', 'notas.id')
             ->join('produks', 'nota_details.produk_id', '=', 'produks.id')
             ->selectRaw('produks.name,sum(qty) as sum')
             ->where('notas.toko_id', Auth::user()->tokos->id)
             ->whereMonth('nota_details.created_at', Carbon::now()->month)
             ->groupBy('produks.name')->orderBy('sum', 'desc')
             ->limit(5)
             ->get();
         // dd($mostdate);
         return view('statistik', compact('date', 'month', 'profitdate', 'profitmonth', 'mostdate', 'mostmonth'));
     }

    public function ajax()
    {

        dd('coba');

        return response()->json($data);
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
