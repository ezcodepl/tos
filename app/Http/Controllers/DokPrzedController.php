<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class DokPrzedController extends Controller
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
        $przedsiebiorca = \App\Przedsiebiorca::latest()->get();

        //echo "<pre />";
        //print_r($przedsiebiorca);
        return view('przedsiebiorca.dokumenty.create', compact('przedsiebiorca'));
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
         'id_przed' => 'required',
         'nazwa' => 'required|max:255',
         'rodz_dok' => 'required:max:255',
         'nr_dok' => 'required|max:255',
         'nr_druku' => 'required|max:255',
         'nr_sprawy' => 'required|max:255',
         'data_wn' => 'required',
         'data_wyd' => 'required',
         'data_waz' => 'required',

        ]);
        $dokumenty = \App\DokumentyPrzed::create($validatedData);

        $data_bz = date('Y-m-d');

        $dok = DB::table('dok_przed')->where('nr_dok' , $request->nr_dok)->get();

        foreach($dok as $dk){
            $id = $dk->id;
        }

        $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $request->id_przed, 'id_dok_przed' => $id, 'nazwa_zm' => 'Dodanie nowego dokumentu o numerze '.$request->nr_dok, 'data_zm' => $data_bz]);

        Alert::success('Dodano nowy dokument', '');
        return redirect('/przedsiebiorca/baza/create')->with('success', 'Dokument dodany do bazy danych');
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

        return view('przedsiebiorca.dokumenty.edit', compact('przedsiebiorca', 'rodzaje','dok'));
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
         'nazwa' => 'required|max:255',
         'rodz_dok' => 'required',
         'nr_dok' => 'required|max:255',
         'p_nr_dok' => 'nullable|max:255',
         'nr_druku' => 'required|max:255',
         'nr_sprawy' => 'required|max:255',
         'data_wn' => 'required',
         'data_wyd' => 'required',
         'data_waz' => 'required',
         'uwagi' => 'string|max:255|nullable'
        ]);

       
        //$dok = DB::table('dok_przed')->where('nr_dok' ,'=', $request->nr_dok)->get();

        \App\DokumentyPrzed::whereId($id)->update($validatedData);

        $dok = DB::table('dok_przed')->where('nr_dok' , $request->nr_dok)->get();

        foreach($dok as $dk){
            $id = $dk->id;
        }

        $data_bz = date('Y-m-d');
        $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $request->id_przed, 'id_dok_przed' => $id, 'nazwa_zm' => 'Zmiana dokumentu z '.$request->p_nr_dok.' na numer '.$request->nr_dok, 'data_zm' => $data_bz]);


        Alert::success('Zmniany Zapisano', 'Dane dokumentów przedsiębiorcy zmienione');

        return redirect('/przedsiebiorca/dokumenty/'.$id.'/edit?nr_dok='.$request->nr_dok)->with('success', 'Dane dokumentów przedsiębiorcy zmienione');
       // return back();
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
