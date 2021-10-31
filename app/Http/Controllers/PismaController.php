<?php

namespace App\Http\Controllers;

use App\Pisma;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Input;
use DB;
use PDF;
use PhpOffice;

class PismaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Pisma  $pisma
     * @return \Illuminate\Http\Response
     */
    public function show(Pisma $pisma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pisma  $pisma
     * @return \Illuminate\Http\Response
     */
    public function edit(Pisma $pisma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pisma  $pisma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pisma $pisma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pisma  $pisma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pisma $pisma)
    {
        //
    }

    public function zf_pdf($id)
    {
       // ini_set('max_execution_time', 0); // 0 = Unlimited

       $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
       //$pdf = PDF::loadView('przedsiebiorca.print_cars', ['przedsiebiorca' => $przedsiebiorca]);
       $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();
      // $cars = DB::table('wykaz_poj')->where('id_przed', $przedsiebiorca->id)->get();
       //$stan = DB::table('dok_przed_wyp')->where('id_przed', $przedsiebiorca->id)->orderBy('id', 'desc')->first();

       //$wypisy = DB::table('dok_przed_wyp')->where('id_przed' , $przedsiebiorca->id)->get();
       $pisma = DB::table('pisma')->where('id_przed' , $przedsiebiorca->id)->get();

        //$nazwa_firmy = $przedsiebiorca->nazwa_firmy;
        $pdf = PDF::loadView('przedsiebiorca.pisma.zf_pdf', ['przedsiebiorca' => $przedsiebiorca,'dok'=> $dok, 'pisma' =>$pisma] );

        return $pdf->stream('pismo_zdolnosc_finansowa.pdf');

    }

    public function tresc($id)
    {
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        //$pdf = PDF::loadView('przedsiebiorca.print_cars', ['przedsiebiorca' => $przedsiebiorca]);
        $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();
        $cars = DB::table('wykaz_poj')->where('id_przed', $przedsiebiorca->id)->get();
        $stan = DB::table('dok_przed_wyp')->where('id_przed', $przedsiebiorca->id)->orderBy('id', 'desc')->first();

        $wypisy = DB::table('dok_przed_wyp')->where('id_przed' , $przedsiebiorca->id)->get();

        return view('przedsiebiorca.pisma.pismo', compact('przedsiebiorca','dok'));
    }

    public function print_zdol_finans(Request $request, $id)
     {
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        $pisma = \App\Pisma::all();
        $pismo = new Pisma;
        $pismo->id_przed = $request->id;
        //$pismo->nazwa = 'Zdolność finansowa';
        $pismo->nr_sprawy = $request->get('nr_sprawy');
        $pismo->data_p = $request->get('data_p');

        $dok = DB::table('dok_przed')->where('nr_dok', $request->nr_dok)->get();



        return view('przedsiebiorca.pisma.print_zdol_finans', compact('przedsiebiorca','pisma','dok'));
     }

     public function pismo_gotowe(Request $request, $id)
     {
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        $pisma = \App\Pisma::all();
        $pismo = new Pisma;
        $pismo->id_przed = $request->id;
        //$pismo->nazwa = 'Zdolność finansowa';
        $pismo->nr_sprawy = $request->get('nr_sprawy');
        $pismo->data_p = $request->get('data_p');
        $pismo->tresc = $request->get('tresc');

        if(empty($pismo->id_przed == $request->id))
         {
            $pismo->save();
         }else {
            $pismo->update(Request::all());
         }

       return view('przedsiebiorca.pisma.podglad', compact('przedsiebiorca','pisma','dok'));
     }

     public function pismo_zarzadzajacy(Request $request, $id)
    {
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        //$pdf = PDF::loadView('przedsiebiorca.print_cars', ['przedsiebiorca' => $przedsiebiorca]);
        $dok = DB::table('dok_przed')->where('nr_dok' , $request->nr_dok)->get();


        return view('przedsiebiorca.pisma.zarzadzajacy', compact('przedsiebiorca','dok'));
    }

    public function pismo_baza(Request $request, $id)
    {
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        //$pdf = PDF::loadView('przedsiebiorca.print_cars', ['przedsiebiorca' => $przedsiebiorca]);
        $dok = DB::table('dok_przed')->where('nr_dok' , $request->nr_dok)->get();


        return view('przedsiebiorca.pisma.baza', compact('przedsiebiorca','dok'));
    }

    public function print_zarzadzajacy(Request $request, $id)
     {
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        $pisma = \App\Pisma::all();
        $pismo = new Pisma;
        $pismo->id_przed = $request->id;
        //$pismo->nazwa = 'Zdolność finansowa';
        $pismo->nr_sprawy = $request->get('nr_sprawy');
        $pismo->data_p = $request->get('data_p');
        $dok = DB::table('dok_przed')->where('nr_dok', $request->nr_dok)->get();

        return view('przedsiebiorca.pisma.print_zarzadzajacy', compact('przedsiebiorca','pisma','dok'));
     }

     public function print_baza(Request $request, $id)
     {
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        $pisma = \App\Pisma::all();
        $pismo = new Pisma;
        $pismo->id_przed = $request->id;
        //$pismo->nazwa = 'Zdolność finansowa';
        $pismo->nr_sprawy = $request->get('nr_sprawy');
        $pismo->data_p = $request->get('data_p');
        $dok = DB::table('dok_przed')->where('nr_dok', $request->nr_dok)->get();

        return view('przedsiebiorca.pisma.print_baza', compact('przedsiebiorca','pisma','dok'));
     }

}
