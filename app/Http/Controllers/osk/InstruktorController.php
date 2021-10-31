<?php

namespace App\Http\Controllers\osk;

use App\Models\Instruktor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use DB;


class InstruktorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $instruktor = \App\Models\Instruktor::all();
        
        return view('osk.instruktorzy.index', compact('instruktor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('osk.instruktorzy.create');
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
        $validatedData = $request->validate([
            'id_osk' => 'nullable',
            'nr_upr' => 'required|max:8',
            'nr_upr' => 'nullable',
            'dat_w' => 'required|date',
            'nr_leg' => 'nullable',
            'p_nr_leg' => 'nullable',
            'imie' => 'required|max:255',
            'nazwisko' => 'required|max:255',
            'adres' => 'required|max:255',
            'pesel' => 'required|max:11',
            'dat_w_leg' => 'nullable',
            'dat_skr' => 'nullable',
            'powod' => 'nullable',
            'warsztaty' => 'required|max:50',
            'orz_lek' => 'required|date',
            'orz_psy' => 'required|date',
            'telefon' => 'nullable',
            'email' => 'nullable',
            'status' => 'nullable',
            'uwagi' => 'nullable',
           ]);

           
           $instruktor = \App\Models\Instruktor::create($validatedData);
            
            Alert::success('', 'Dodano nowego instruktora');
        
        return view('osk.instruktorzy.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instruktor  $instruktor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
       
       
       $instruktor = \App\Models\Instruktor::findOrFail($id);
       // $kategoria = \App\Models\KategorieIns::findOrFail($request->id_ins);
       $kategoria = DB::table('osk_kat_inst')->where('id_inst' , $id)->get();
        
        //echo '<pre />';
       // print_r($kategoria);
        //exit;

             return view('osk.instruktorzy.show', compact('instruktor','kategoria'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instruktor  $instruktor
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $instruktor = \App\Models\Instruktor::findOrFail($id);
        
        return view('osk.instruktorzy.edit', compact('instruktor'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instruktor  $instruktor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'id_osk' => 'nullable',
            'nr_upr' => 'required|max:8',
            'nr_upr' => 'nullable',
            'dat_w' => 'required|date',
            'nr_leg' => 'nullable',
            'p_nr_leg' => 'nullable',
            'imie' => 'required|max:255',
            'nazwisko' => 'required|max:255',
            'adres' => 'required|max:255',
            'pesel' => 'required|max:11',
            'dat_w_leg' => 'required|date',
            'dat_skr' => 'nullable',
            'powod' => 'nullable',
            'warsztaty' => 'required|max:50',
            'orz_lek' => 'required|date',
            'orz_psy' => 'required|date',
            'tel' => 'nullable',
            'email' => 'nullable',
            'status' => 'nullable',
            'uwagi' => 'nullable',
           ]);

           \App\Models\Instruktor::whereId($id)->update($validatedData); //update
           //print_r($validatedData);
           //exit;
           Alert::success('', 'Zmieniono dane instruktora');

           return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instruktor  $instruktor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instruktor $instruktor)
    {
        //
    }
}
