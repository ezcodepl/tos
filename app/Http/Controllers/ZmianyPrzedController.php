<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class ZmianyPrzedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $przedsiebiorca = \App\Przedsiebiorca::findOrfail($id);
        $dok = DB::table('dok_przed')->where('id_przed', $przedsiebiorca->id)->where('nr_dok', $request->route('nr_dok'))->get();

        $dok_id = DB::table('dok_przed')->where('nr_dok', $request->route('nr_dok'))->get();

        foreach($dok_id as $id){
            $id_dok = $id->id;
        }
        $historia = DB::table('hist_zmian_przed')->where('id_przed', $przedsiebiorca->id)->where('id_dok_przed', '=', $id_dok)->get();

        return view('przedsiebiorca.zmiany.index', compact('przedsiebiorca', 'dok', 'historia'));
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
