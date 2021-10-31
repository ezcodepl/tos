<?php

namespace App\Http\Controllers\kontrole;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Alert;
use \Carbon\Carbon;

class Kontrole extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('przedsiebiorca.kontrole.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $dok = DB::table('dok_przed')->where('id_przed' , $request->id_przed)->where('nr_dok' , $request->nr_dok)->get();

        return view('przedsiebiorca.kontrole.create', compact('dok'));
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
            'id_przed' => 'required|max:1',
            'id_dok_przed' => 'required|nullable',
            'nazwa' => 'string|max:255|nullable',
            'nr_sprawy' => 'string|max:255|nullable',
            'dat_zawiad' => 'required',
            'dat_roz' => 'required',
            'dat_zak' => 'required',
            'nr_upo' => 'required|max:255',
            'kto' => 'required|max:255',
            'wynik' => 'string|max:255|nullable',
            'zalecenia' => 'string|max:1000|nullable',
            'uwagi' => 'string|max:255|nullable'
           ]);
           $kontrole = \App\Kontrole::create($validatedData);

           $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $request->id_przed, 'id_dok_przed' => $request->id_dok_przed, 'nazwa_zm' => 'Zaplanowano nową kontrolę przedsiębiorcy od '.$request->dat_roz.' do '.$request->dat_zak, 'data_zm' => $request->dat_zawiad]);

        Alert::success('Dodano nową kontrolę', 'Zaplanowano kontrolę przedsiębiorcy');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $dok = DB::table('dok_przed')->where('nr_dok' , $request->nr_dok)->get();
        $przedsiebiorca = DB::table('przedsiebiorca')->where('id' , $id)->get();

        //print_r($przedsiebiorca);
        //exit;
        foreach($dok as $dk){
            $id_dok = $dk->id;
        }

        $kontrole = DB::table('kontrole')->where('id_dok_przed' , $id_dok)->get();

        //echo "<pre />";
        //print_r($kontrole);

        return view('/przedsiebiorca.kontrole.show', compact('dok', 'kontrole','przedsiebiorca'));


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
        $dok = DB::table('dok_przed')->where('id' , $request->id_dok_przed)->get();
        $przedsiebiorca = DB::table('przedsiebiorca')->where('id' , $request->id_przed)->get();
        $kontrole = DB::table('kontrole')->where('id' , $id)->get();


        return view('przedsiebiorca.kontrole.edit', compact('dok','kontrole','przedsiebiorca'));
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
        $validatedData = $request->validate([
            'id_przed' => 'required|max:1',
            'id_dok_przed' => 'required|nullable',
            'nazwa' => 'string|max:255|nullable',
            'nr_sprawy' => 'string|max:255|nullable',
            'dat_zawiad' => 'required',
            'dat_roz' => 'required',
            'dat_zak' => 'required',
            'dat_ost_kont' =>'string|nullable',
            'nr_upo' => 'required|max:255',
            'kto' => 'required|max:255',
            'wynik' => 'string|max:255|nullable',
            'zalecenia' => 'string|max:1000|nullable',
            'uwagi' => 'string|max:255|nullable'
           ]);
          \App\Kontrole::whereId($id)->update($validatedData); //update danych przedsiebiorcy


        Alert::success('Zapisano dane', 'Dane kontroli uzupełniono');
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

    public function create_harmo()
    {
        $przedsiebiorca = \App\Przedsiebiorca::all();

        $dok= DB::table('dok_przed')
             ->join('przedsiebiorca', 'przedsiebiorca.id', '=' ,'dok_przed.id_przed')
             ->select('dok_przed.*','przedsiebiorca.*')->get();

        $newyear = date('Y')+1;
        //print_r($dok);

        return view('przedsiebiorca.kontrole.new_harmo', compact('przedsiebiorca','dok','newyear'));
    }

    public function details(Request $request, $id)
    {
        $dok = DB::table('dok_przed')->where('nr_dok' , $request->nr_dok)->get();
        $przedsiebiorca = DB::table('przedsiebiorca')->where('id' , $request->id_przed)->get();

        foreach($dok as $dk){
            $id_dok = $dk->id;
        }

        $kontrole = DB::table('kontrole')->where('id' , $request->id)->get();


        return view('przedsiebiorca.kontrole.details', compact('dok','kontrole','przedsiebiorca'));
    }

    public function new_zaw(Request $request, $id)
    {
        $dok = DB::table('dok_przed')->where('nr_dok' , $request->nr_dok)->get();
        $przedsiebiorca = DB::table('przedsiebiorca')->where('id' , $request->id_przed)->get();

        foreach($dok as $dk){
            $id_dok = $dk->id;
        }

        $kontrole = DB::table('kontrole')->where('id' , $request->id)->get();
        return view('przedsiebiorca.kontrole.nowe_zaw', compact('dok','kontrole','przedsiebiorca'));
    }

    public function new_upo(Request $request, $id)
    {
        $dok = DB::table('dok_przed')->where('nr_dok' , $request->nr_dok)->get();
        $przedsiebiorca = DB::table('przedsiebiorca')->where('id' , $request->id_przed)->get();

        foreach($dok as $dk){
            $id_dok = $dk->id;
        }

        $kontrole = DB::table('kontrole')->where('id' , $request->id)->get();
        return view('przedsiebiorca.kontrole.nowe_upo', compact('dok','kontrole','przedsiebiorca'));
    }
}
