<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class ZdolnoscController extends Controller
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
         $przedsiebiorca = \App\Przedsiebiorca::latest()->get();

        return view('przedsiebiorca.zabezpieczenie.create', compact('przedsiebiorca'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
         'id_przed' => 'required|max:1',
         'id_dok_przed' => 'required|nullable',
         'nazwa' => 'string|max:255|nullable',
         'numer' => 'string|max:255|nullable',
         'data_od' => 'string|max:255|nullable',
         'data_do' => 'string|max:255|nullable',
         'ile_poj' => 'required|max:255',
         'suma_zab' => 'required|max:255',
         'status' => 'required|max:16|nullable',
         'uwagi' => 'string|max:255|nullable'
        ]);
        $baza = \App\Zdolnosc::create($validatedData);

        $data_bz = date('Y-m-d');

        $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $request->id_przed, 'id_dok_przed' => $request->id_dok_przed, 'nazwa_zm' => 'Dodanie nowego zabezpieczenia finansowego', 'data_zm' => $data_bz]);

        Alert::success('Dodano nowe zabezpieczenie', 'Zdolnosć finansowa przypisana do przedsiębiorcy');
        return redirect('/przedsiebiorca')->with('success', 'Baza eksploatacyjna przypisana do przedsiębiorcy');
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

        $zdf = DB::table('zdol_finans')->where('id_przed' , $id)->where('id_dok_przed' , $dk->id)->get();

        return view('przedsiebiorca.zabezpieczenie.edit', compact('przedsiebiorca', 'rodzaje','zdf'));
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
       // echo $request->nazwa;
      //  echo $request->numer;
     $validatedData = $request->validate([
           'nazwa' => 'required|nullable',
           'numer' => 'string|max:255|nullable',
            'data_od' =>'string|max:255|nullable',
            'data_do' => 'string|max:255|nullable',
            'ile_poj' => 'string|max:255|nullable',
            'suma_zab' => 'string|max:255|nullable',
            'status' => 'string|max:2|nullable',
            'uwagi' => 'string|max:255|nullable',
     ]);
       // echo $id;
       \App\Zdolnosc::whereId($id)->update($validatedData);
       Alert::success('Zapisano zmiany', 'Dane zdolności finansowej zmienione');
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
}
