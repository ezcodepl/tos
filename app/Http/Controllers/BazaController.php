<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers\DokPrzedCotroller;
use \App\DokumentyPrzed;
use DB;
use Alert;

class BazaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $baza = \App\Baza::all();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $przedsiebiorca = \App\Przedsiebiorca::latest()->get();

        return view('przedsiebiorca.baza.create', compact('przedsiebiorca'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dok = DB::table('dok_przed')->latest()->limit(1)->get();



        foreach($dok as $dk)
         {

          $dk->nr_dok;

          $dk->id;
         }

        if(count($dok) > 0){
            $validatedData = $request->validate([
                'id_przed' => 'required|max:1',
                'id_dok_przed' => 'required|nullable',
                'rodzaj' => 'string|max:255|nullable',
                'gmina' => 'string|max:255|nullable',
                'adres' => 'required|max:255',
                'miasto' => 'required|max:255',
                'kod_p' => 'required|max:6',
                'wlasnosc' => 'string|max:255|nullable',
                'umowa' => 'string|max:255|nullable',
                'uwagi' => 'string|max:255|nullable'
               ]);
               $baza = \App\Baza::create($validatedData);

              $data_bz = date('Y-m-d');

               $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $request->id_przed, 'id_dok_przed' => $dk->id, 'nazwa_zm' => 'Zgłoszenie nowej bazy eksploatacyjnej', 'data_zm' => $data_bz]);

               Alert::success('Dodano nową bazę', 'Baza eksploatacyjna przypisana do przedsiębiorcy');
               return redirect('/przedsiebiorca/zarzadzajacy/create')->with('success', 'Baza eksploatacyjna przypisana do przedsiębiorcy');
        }

        else {
            Alert::error('Brak danych w bazie');
            return redirect('/przedsiebiorca/baza/create');
        }


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
    public function edit(Request $request, $id)
    {
        //
        $rodzaje= DB::table('rodzaj_przed')->get();

        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);

        $dok = DB::table('dok_przed')->where('id_przed' , $id)->where('nr_dok' , $request->nr_dok)->get();

        foreach($dok as $dk)
        {
            $dk->id;
        }

        $baza = DB::table('baza_eksp')->where('id_przed' , $id)->where('id_dok_przed' , $dk->id)->get();

       return view('przedsiebiorca.baza.edit', compact('przedsiebiorca', 'rodzaje','baza'));
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

        $validatedData = $request->validate([
         'id_przed' => 'required|max:5',
         'rodzaj' => 'string|max:255|nullable',
         'gmina' => 'string|max:255|nullable',
         'adres' => 'required|max:255',
         'miasto' => 'required|max:255',
         'kod_p' => 'required|max:6',
         'wlasnosc' => 'string|max:255|nullable',
         'umowa' => 'string|max:255|nullable',
         'dat_umowy' => 'string|max:255|nullable',
         'uwagi' => 'string|max:255|nullable'
        ]);

        $baza = DB::table('baza_eksp')->where('id' , $id)->get();

        foreach($baza as $bz){

            $adres = $bz->adres;
            $wlasnosc = $bz->wlasnosc;
        }
        $dok = DB::table('dok_przed')->where('nr_dok' , $request->nr_dok)->get();

        foreach($dok as $dk)
         {

          $dk->nr_dok;

          $dk->id;
         }


        $data_zm = date('Y-m-d');

        // zapisanie historii wykonanych zmian danych przedsiebiorcy
        if($request->adres <> $adres) {
            $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $id, 'id_dok_przed' => $request->id_dok, 'nazwa_zm' => 'Zmiana adresu bazy eksploatacyjnej z '. $adres .' na '.$request->adres, 'data_zm' => $data_zm]);
        }elseif($request->wlasnosc <> $wlasnosc) {
            $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $id, 'id_dok_przed' => $request->id_dok, 'nazwa_zm' => 'Zmiana prawa własności z '. $wlasnosc .' na '.$request->wlasnosc, 'data_zm' => $data_zm]);
        }

        $baza = \App\Baza::whereId($id)->update($validatedData);

        Alert::success('Zapisano zmiany', 'Baza eksploatacyjna przedsiębiorcy');
        return back();
        //return redirect('/przedsiebiorca/')->with('success', 'Baza eksploatacyjna przypisana do przedsiębiorcy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function bz()
    {

    }
}
