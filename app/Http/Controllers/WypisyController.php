<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Alert;
use DB;
use PDF;


class WypisyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        //
         $przedsiebiorca = \App\Przedsiebiorca::findOrfail($id);
         $wypisy =  DB::table('dok_przed_wyp')->where('id_przed', $przedsiebiorca->id)->get();
         $dok = DB::table('dok_przed')->where('nr_dok','=', $request->route('nr_dok'))->get();
         $stan = DB::table('dok_przed_wyp')->where('id_przed', $przedsiebiorca->id)->orderBy('id', 'desc')->first();



        //print_r($dok);
        return view('przedsiebiorca.wypisy.index', compact('przedsiebiorca','wypisy','dok','stan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $przedsiebiorca = \App\Przedsiebiorca::latest()->get();
         $dok = DB::table('dok_przed')->get();

         return view('przedsiebiorca.wypisy.create', compact('przedsiebiorca','dok'));
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
         'id_dok_przed' => 'required',
         'nazwa' => 'required|max:255',
         'rodzaj_wyp' => 'required:max:255',
         'nr_wyp' => 'string|max:255',
         'nr_druku' => 'string|max:255',
         'nr_sprawy' => 'required|max:255',
         'data_wn' => 'required',
         'data_wyd' => 'required',

        ]);
        $dokumenty = \App\Wypisy::create($validatedData);
        $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $request->id_przed, 'id_dok_przed' => $request->id_dok_przed, 'nazwa_zm' => 'Zgłoszenie nowego wypisu o numerze - '.$request->nr_wyp, 'data_zm' => $request->data_wn]);

        $dok = DB::table('dok_przed')->where('id' , $request->id_dok_przed)->get();

        foreach($dok as $dk)
         {
             $nr_dok = $dk->nr_dok;
         }
        // Alert::success('Dodano nowy wypis', '');
        return redirect('/przedsiebiorca/'.$request->id_przed.'/dokument/'.$nr_dok.'/wypisy/')->with('success', 'Dokument dodany do bazy danych');
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
    public function update(Request $request)
    {

         $wypisy = \App\Wypisy::findOrFail($request->idwyp);

         $wypisy->update($request->all());

         $dok = DB::table('dok_przed')->where('nr_dok' , $request->nr_dok)->get();

            foreach($dok as $dk)
            {
                $nr_dok = $dk->nr_dok;
            }


         Alert::success('Zapisano zmiany', 'Dane wypisu zmienione');
         return redirect('/przedsiebiorca/'.$request->id_przed.'/dokument/'.$nr_dok.'/wypisy/')->with('success', 'Dane zapisano');

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
        $delete = \App\Wypisy::where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "User deleted successfully";
        } else {
            $success = true;
            $message = "User not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function wypisyPDF(Request $request, $id)
    {
        //set_time_limit(0);

       $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
       //$pdf = PDF::loadView('przedsiebiorca.print_cars', ['przedsiebiorca' => $przedsiebiorca]);
       $dok = DB::table('dok_przed')->where('nr_dok' , $request->nr_dok)->get();
       $cars = DB::table('wykaz_poj')->where('id_przed', $przedsiebiorca->id)->get();
       $stan = DB::table('dok_przed_wyp')->where('id_przed', $przedsiebiorca->id)->orderBy('id', 'desc')->first();

       $wypisy = DB::table('dok_przed_wyp')->where('id_przed' , $przedsiebiorca->id)->get();
        //$nazwa_firmy = $przedsiebiorca->nazwa_firmy;
        $pdf = PDF::loadView('przedsiebiorca.wypisy.print_wypisy', ['przedsiebiorca' => $przedsiebiorca,'dok'=> $dok, 'cars'=>$cars, 'stan' => $stan , 'wypisy' => $wypisy] );

        return $pdf->stream('wypisy.pdf');

    }

    public function print_wypisy($id)
    {
        //
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);


        return view('przedsiebiorca.print_cars', compact('przedsiebiorca'));


    }

    public function depozyt(Request $request)
    {


      $wypisy = \App\Wypisy::findOrFail($request->id);

      $input = Input::all();
      $data_wyc = Input::get('dat_dep_wp');
      $id_przed = Input::get('id_przed');


      $wypisy->update(['status'=>'2','dat_dep_wp'=>$data_wyc]);

      $wyp = DB::table('dok_przed_wyp')->where('id',$request->id)->get();

      foreach($wyp as $wp)
      {
          $nr_wyp = $wp->nr_wyp;
      }


      $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $id_przed, 'id_dok_przed' => $request->id_dok_przed, 'nazwa_zm' => 'Zgłoszenie do depozytu wypisu o numerze - '.$nr_wyp, 'data_zm' => $data_wyc]);

      return redirect('/przedsiebiorca/'.$id_przed.'/dokument/'.$request->nr_dok.'/wypisy/');
    }

    public function depozytwyd(Request $request)
    {
      $wypisy = \App\Wypisy::findOrFail($request->id);

      $input = Input::all();
      $data_wyc = Input::get('dat_dep_wyd');
      $id_przed = Input::get('id_przed');
      $dat_wp = NULL;


      $wyp = DB::table('dok_przed_wyp')->where('id',$request->id)->get();

      foreach($wyp as $wp)
      {
          $nr_wyp = $wp->nr_wyp;
      }

      $wypisy->update(['status'=>'1','dat_dep_wp'=>$dat_wp,'dat_dep_wyd'=>$data_wyc]);
      $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $id_przed, 'id_dok_przed' => $request->id_dok_przed, 'nazwa_zm' => 'Wydanie z depozytu wypisu o numerze - '.$nr_wyp, 'data_zm' => $data_wyc]);

      return redirect('/przedsiebiorca/'.$id_przed.'/dokument/'.$request->nr_dok.'/wypisy/');
    }
}
