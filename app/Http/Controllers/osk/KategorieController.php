<?php

namespace App\Http\Controllers\osk;

use App\Models\KategorieIns;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class KategorieController extends Controller
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
        return view('osk.kategorie.create');
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
            'id_inst' => 'nullable',
            'nr_upr' => 'nullable',
            'kat_a' => 'nullable',
            'dat_a' => 'nullable',
            'kat_am' => 'nullable',
            'dat_am' => 'nullable',
            'kat_a1' => 'nullable',
            'dat_a1' => 'nullable',
            'kat_a2' => 'nullable',
            'dat_a2' => 'nullable',
            'kat_b' => 'nullable',
            'dat_b' => 'nullable',
            'kat_b1' => 'nullable',
            'dat_b1' => 'nullable',
            'kat_be' => 'nullable',
            'dat_be' => 'nullable',
            'kat_c' => 'nullable',
            'dat_c' => 'nullable',
            'kat_c1' => 'nullable',
            'dat_c1' => 'nullable',
            'kat_c1e' => 'nullable',
            'dat_c1e' => 'nullable',
            'kat_ce' => 'nullable',
            'dat_ce' => 'nullable',
            'kat_d' => 'nullable',
            'dat_d' => 'nullable',
            'kat_d1' => 'nullable',
            'dat_d1' => 'nullable',
            'kat_d1e' => 'nullable',
            'dat_d1e' => 'nullable',
            'kat_de' => 'nullable',
            'dat_de' => 'nullable',
            'kat_t' => 'nullable',
            'dat_t' => 'nullable',
            'kat_t1' => 'nullable',
            'dat_t1' => 'nullable',
            'uwagi' => 'nullable',
           ]);

           $kategoria = \App\Models\KategorieIns::create($validatedData);
            
           Alert::success('', 'Dodano nowe kategorie instruktora');
           return redirect('/instruktor/'.$request->id_inst);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategorieIns  $kategorieIns
     * @return \Illuminate\Http\Response
     */
    public function show(KategorieIns $kategorieIns)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategorieIns  $kategorieIns
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $kat = \App\Models\KategorieIns::findOrFail($id);
        return view('osk.kategorie.edit', compact('kat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategorieIns  $kategorieIns
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
      //echo $request->kat_a;
      //exit;
        $validatedData = $request->validate([
            'id_inst' => 'nullable',
            'nr_upr' => 'nullable',
            'kat_a' => 'nullable',
            'dat_a' => 'nullable',
            'kat_am' => 'nullable',
            'dat_am' => 'nullable',
            'kat_a1' => 'nullable',
            'dat_a1' => 'nullable',
            'kat_a2' => 'nullable',
            'dat_a2' => 'nullable',
            'kat_b' => 'nullable',
            'dat_b' => 'nullable',
            'kat_b1' => 'nullable',
            'dat_b1' => 'nullable',
            'kat_be' => 'nullable',
            'dat_be' => 'nullable',
            'kat_c' => 'nullable',
            'dat_c' => 'nullable',
            'kat_c1' => 'nullable',
            'dat_c1' => 'nullable',
            'kat_c1e' => 'nullable',
            'dat_c1e' => 'nullable',
            'kat_ce' => 'nullable',
            'dat_ce' => 'nullable',
            'kat_d' => 'nullable',
            'dat_d' => 'nullable',
            'kat_d1' => 'nullable',
            'dat_d1' => 'nullable',
            'kat_d1e' => 'nullable',
            'dat_d1e' => 'nullable',
            'kat_de' => 'nullable',
            'dat_de' => 'nullable',
            'kat_t' => 'nullable',
            'dat_t' => 'nullable',
            'kat_t1' => 'nullable',
            'dat_t1' => 'nullable',
            'uwagi' => 'nullable',
           ]);

           \App\Models\KategorieIns::whereId($id)->update($validatedData); //update
           //print_r($validatedData);
           //exit;
           Alert::success('', 'Zmieniono kategorie');

           return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategorieIns  $kategorieIns
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategorieIns $kategorieIns)
    {
        //
    }
}
