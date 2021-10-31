<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Input;
use DB;
use Alert;

class WykazPojController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$przedsiebiorca = \App\Przedsiebiorca::all();

       // $cars = DB::table('wykaz_poj')->where('id', $przedsiebiorca->id)->get();

       // return view('przedsiebiorca.show', compact('przedsiebiorca','cars'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $przedsiebiorca= DB::table('wykaz_poj')->get();

        return view('przedsiebiorca.cars', compact('przedsiebiorca'));
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
        // $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
       // Alert::success('Dodano nowy pojazd', '');
        $validatedData = $request->validate([
         'id_przed' => 'required',
         'id_dok_przed' => 'required',
         'rodzaj_poj' => 'required|max:255',
         'marka' => 'required|max:255',
         'nr_rej' => 'required|max:255',
         'nr_vin' => 'required|max:255',
         'dmc' => 'required|max:255',
         'wlasnosc' => 'required|max:255',
         'data_wpr' => 'required|max:11',
         'status' => 'default|1',

        ]);
        $dok = DB::table('dok_przed')->where('id_przed','=', $request->id_przed)->where('id','=',$request->id_dok_przed)->get();
          //  echo $request->id_dok_przed;
        foreach($dok as $dkp)
          {
              $nr_dok = $dkp->nr_dok;
          }
        $pojazdy = \App\WykazPoj::create($validatedData);
        $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $request->id_przed, 'id_dok_przed' => $request->id_dok_przed, 'nazwa_zm' => 'Zgłoszenie nowego pojazdu o numerze rejestracyjnym - '.$request->nr_rej, 'data_zm' => $request->data_wpr]);
        Alert::success('Dodano nowy pojazd', '');
        return redirect('przedsiebiorca/'.$request->id_przed.'/dokument/'.$nr_dok.'/cars');
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
         $cars = \App\WykazPoj::findOrFail($id);
         //$dok = DB::table('dok_przed')->where('id_przed')->get();
         //echo '<pre/>';
         //print_r($cars);
         return view('przedsiebiorca.pojazdy.edit', compact('cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $cars = \App\WykazPoj::findOrFail($request->idcar);



        $cars->update($request->all());

        $dok = DB::table('dok_przed')->where('id_przed','=', $request->id_przed)->where('id','=',$request->id_dok_przed)->get();
        //  echo $request->id_dok_przed;
        foreach($dok as $dkp)
            {
                $nr_dok = $dkp->nr_dok;
            }

        $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $request->id_przed, 'id_dok_przed' => $request->id_dok_przed, 'nazwa_zm' => 'Zmiana danych pojazdu o numerze rejestracyjnym - '.$request->nr_rej, 'data_zm' => $request->data_wpr]);


        Alert::success('Zapisano zmiany', 'Dane pojazdu zostały zmienione');
        return back();
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

   public function wycofaj(Request $request)
    {

       //return view('przedsiebiorca.pojazdy.wycofaj');
      $cars = \App\WykazPoj::findOrFail($request->id);
      $dok = DB::table('dok_przed')->where('id_przed','=', $request->id_przed)->where('id','=',$request->id_dok_przed)->get();
        //  echo $request->id_dok_przed;
        foreach($dok as $dkp)
            {
                $nr_dok = $dkp->nr_dok;
            }

      $data_wyc = $request->data_wyc;
      $id_przed = $request->id_przed;

      $cars->update(['status'=>'2','data_wyc'=>$data_wyc]);

      $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $request->id_przed, 'id_dok_przed' => $request->id_dok_przed, 'nazwa_zm' => 'Wycofano pojazd o numerze rejestracyjnym - '.$request->nr_rej, 'data_zm' => $request->data_wpr]);


      return back();
    }



}
