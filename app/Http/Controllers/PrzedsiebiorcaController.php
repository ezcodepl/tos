<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;
use \App\WykazPoj;
use \App\Pisma;
use \App\Http\Controllers\DokPrzedCotroller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use \App\DokumentyPrzed;

class PrzedsiebiorcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rodzaje= DB::table('dok_przed')
             ->join('przedsiebiorca', 'przedsiebiorca.id', '=' ,'dok_przed.id_przed')
             ->join('rodzaj_przed', 'rodzaj_przed.id', "=", 'przedsiebiorca.id_osf')
             ->select('rodzaj_przed.*','dok_przed.*','przedsiebiorca.*')
             ->paginate(15);

        $zdolnosc = \App\Zdolnosc::all();

        return view('przedsiebiorca.index', compact('rodzaje','zdolnosc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rodzaje= DB::table('rodzaj_przed')->get();

        return view('przedsiebiorca.create', compact('rodzaje'));

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
         'id_osf' => 'required',
         'nazwa_firmy' => 'required|max:255',
         'imie' => 'required|max:255',
         'nazwisko' => 'required|max:255',
         'adres' => 'required|max:255',
         'miejscowosc' => 'required|max:255',
         'kod_p' => 'required|max:6',
         'nip' => 'required|max:11',
         'gmina' => 'required|max:255',
         'regon' => 'required|max:9',
         'telefon' => 'required|max:10',

        ]);
        $przedsiebiorca = \App\Przedsiebiorca::create($validatedData);


            Alert::success('', 'Dodano nowego przedsiębiorcę');

        return redirect('/przedsiebiorca/dokumenty/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //$przedsiebiorca = DB::table('przedsiebiorca')->where('id' , $request->route('id'))->get();
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($request->route('id'));

        $rodzaje= DB::table('dok_przed')
        ->join('przedsiebiorca', 'przedsiebiorca.id', '=' ,'dok_przed.id_przed')
        ->join('rodzaj_przed', 'rodzaj_przed.id', "=", 'przedsiebiorca.id_osf')
        ->select('rodzaj_przed.*','dok_przed.*','przedsiebiorca.*')
        ->where('dok_przed.id_przed', '=', $request->route('id'))
        ->where('dok_przed.nr_dok', '=', $request->route('nr_dok'))
        ->get();

        foreach($rodzaje as $rr){
         $id_osf = $rr->id_osf;
        }

        $osobowosc = DB::table('rodzaj_przed')->where('id','=', $id_osf)->get();

        $dok = DB::table('dok_przed')->where('id_przed' , $request->route('id'))->get();

        $nr_dok = DB::table('dok_przed')->where('nr_dok', $request->route('nr_dok'))->get();

        foreach($nr_dok as $nr)
        {
            $id = $nr->id;
            $nr_dok = $nr->nr_dok;
        }
        $kontrole = DB::table('kontrole')->where('id_przed' , $request->route('id'))->where('id_dok_przed', '=', $id)->get();


        $baza = DB::table('baza_eksp')->where('id_przed', $request->route('id'))->where('id_dok_przed', '=', $id)->get();

        $zab = DB::table('zdol_finans')->where('id_przed', $request->route('id'))->where('id_dok_przed', '=', $id)->get();

        $cert = DB::table('cert_komp')->where('id_przed', $request->route('id'))->where('id_dok_przed', '=', $id)->get();
        //echo '<pre/>';
        ///print_r($cert);
        //exit;
        $cars = DB::table('wykaz_poj')->where('id', $request->route('id'))->get();

        $id_dok = \App\DokumentyPrzed::all()->where('nr_dok','=',$rr->nr_dok);

        return view('przedsiebiorca.show', compact('przedsiebiorca','rodzaje','osobowosc','dok','cert','baza','zab','cars','kontrole','id_dok'));
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
         $rodzaje= DB::table('rodzaj_przed')->get();

         $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
         $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();
         $baza = DB::table('baza_eksp')->where('id_przed' , $przedsiebiorca->id)->get();
         $osz = DB::table('cert_komp')->where('id_przed' , $przedsiebiorca->id)->get();
         $zdf = DB::table('zdol_finans')->where('id_przed' , $przedsiebiorca->id)->get();

         return view('przedsiebiorca.edit', compact('przedsiebiorca', 'rodzaje','dok','baza','osz','zdf'));

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
         'id_osf' => 'required|max:2',
         'nazwa_firmy' => 'required|max:255',
         'imie' => 'required|max:255',
         'nazwisko' => 'required|max:255',
         'adres' => 'required|max:255',
         'miejscowosc' => 'required|max:255',
         'gmina' => 'required|max:255',
         'kod_p' => 'required|max:6',
         'nip' => 'required|max:11',
         'regon' => 'required|max:9',
         'telefon' => 'required|max:10',
         'uwagi' => 'required',
     ]);

     $przedsiebiorca = DB::table('przedsiebiorca')->where('id' , $id)->get();

     foreach($przedsiebiorca as $przed){
        $firma = $przed->nazwa_firmy;
        $adres = $przed->adres;
     }

     $data_zm = date('Y-m-d');

    // zapisanie historii wykonanych zmian danych przedsiebiorcy
    if($request->nazwa_firmy <> $firma) {
        $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $id, 'id_dok_przed' => null, 'nazwa_zm' => 'Zmiana nazwy firmy z '. $firma .' na '.$request->nazwa_firmy, 'data_zm' => $data_zm]);
    }elseif($request->adres <> $adres) {
        $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $id, 'id_dok_przed' => null, 'nazwa_zm' => 'Zmiana adresu firmy z '. $adres .' na '.$request->adres, 'data_zm' => $data_zm]);
    }

    // koniec zapisu historii zmian

     \App\Przedsiebiorca::whereId($id)->update($validatedData); //update danych przedsiebiorcy

    if($validatedData){
        Alert::success('Zmiany Zapisano', 'Dane przedsiębiorcy zmienione');
    }else {
        Alert::error('Zmiany nie zostały zapisane', 'Powstał błąd spróbuj ponownie.');
    }

     return back();//->with('success', 'Dane przedsiębiorcy zmienione');
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

            $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
           // $przedsiebiorca->delete();

            return redirect('/przedsiebiorca')->with('danger', 'Dane przedsiębiorcy usunięte');
    }

    public function zawies(Request $request, $id)
    {
        $zawies = \App\Przedsiebiorca::findOrFail($request->id);

        $input = $request->all();
        $id = $request->route('idz');

        $zawies_lic = DB::table('dok_przed')->where('nr_dok', $request->nr_dok)->get();

        foreach($zawies_lic as $li){
            $li->id;
            $li->id_przed;
        }

        $powod = Input::get('powod');
        $dat_zaw = Input::get('dat_zaw');
        $dat_zaw_do = Input::get('dat_zaw_do');
        $dat_zaw_new = Carbon::createFromDate($dat_zaw)->addYear()->format('Y-m-d');
        $lic = \App\DokumentyPrzed::findOrFail($li->id);


        $lic->update(['status'=>'2','dat_zaw'=> $dat_zaw_new,'dat_zaw_do'=> $dat_zaw_do,'powod'=>$powod]);

        $data_zm = date('Y-m-d');
        $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $li->id_przed, 'id_dok_przed' => $li->id, 'nazwa_zm' => 'Zawieszenie dokumentu '.$li->nr_dok.' przedsiębiorcy od '.$dat_zaw.' do '.$dat_zaw_do,'data_zm' => $dat_zaw]);

        Alert::warning('Zawieszono licencję/zezwolenie przedsiębiorcy', '');
        return redirect('/przedsiebiorca');
    }

    public function odwies(Request $request, $id)
    {

        $input = Input::all();
        $id = Input::get('ido');
        $odwies_lic = DB::table('dok_przed')->where('nr_dok', $request->nr_dok)->get();

        foreach($odwies_lic as $lic){
          $lic->id;
        }
        $dat_odw = Input::get('dat_odw');

        $dat_odw_new = Carbon::createFromDate($dat_odw)->format('Y-m-d');
        $lico = \App\DokumentyPrzed::findOrFail($lic->id);
        $lico->update(['dat_odw'=> $dat_odw, 'status'=>'0', 'dat_zaw'=>null,'powod'=>null]);


        $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $lic->id, 'id_dok_przed' => $lic->id, 'nazwa_zm' => 'Przywrócenie dokumentu '.$lic->nr_dok.' przedsiębiorcy po zawieszeniu ','data_zm' => $dat_odw]);

        Alert::warning('Odwieszono licencję/zezwolenie przedsiębiorcy', '');
        return redirect('/przedsiebiorca');
    }

    public function cars(Request $request, $id)
    {
        //
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($request->route('id'));

        $rodzaje= DB::table('dok_przed')
        ->join('przedsiebiorca', 'przedsiebiorca.id', '=' ,'dok_przed.id_przed')
        ->join('rodzaj_przed', 'rodzaj_przed.id', "=", 'przedsiebiorca.id_osf')
        ->select('rodzaj_przed.*','dok_przed.*','przedsiebiorca.*')
        ->where('dok_przed.id_przed', '=', $request->route('id'))
        ->where('dok_przed.nr_dok', '=', $request->route('nr_dok'))
        ->get();

        $dok = DB::table('dok_przed')->where('id_przed' , $request->route('id'))->where('nr_dok', $request->route('nr_dok'))->get();
        foreach($dok as $dkp)
        {
          $id_dok_przed = $dkp->id;
        }

        $cars = DB::table('wykaz_poj')->where('id_przed', $request->route('id'))->where('id_dok_przed', $id_dok_przed)->get();

        $stan = DB::table('wykaz_poj')->where('id_przed', $przedsiebiorca->id)->orderBy('updated_at', 'desc')->first();

        if(count($cars) > 0)
         {
            //print_r($cars);
         }else {
            return view('przedsiebiorca.cars', compact('przedsiebiorca','dok','cars','stan','rodzaje'));
         }



        return view('przedsiebiorca.cars', compact('przedsiebiorca','dok','cars','stan','rodzaje'));

    }

    public function gPDF(Request $request, $id)
    {
        //set_time_limit(0);

       $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
       //$pdf = PDF::loadView('przedsiebiorca.print_cars', ['przedsiebiorca' => $przedsiebiorca]);
       $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();
       $cars = DB::table('wykaz_poj')->where('id_przed', $przedsiebiorca->id)->get();
       $stan = DB::table('wykaz_poj')->where('id_przed', $przedsiebiorca->id)->orderBy('id', 'desc')->first();

       $rodzaje= DB::table('dok_przed')
        ->join('przedsiebiorca', 'przedsiebiorca.id', '=' ,'dok_przed.id_przed')
        ->join('rodzaj_przed', 'rodzaj_przed.id', "=", 'przedsiebiorca.id_osf')
        ->select('rodzaj_przed.*','dok_przed.*','przedsiebiorca.*')
        ->where('dok_przed.id_przed', '=', $request->route('id'))
        ->where('dok_przed.nr_dok', '=', $request->route('nr_dok'))
        ->get();

        $pdf = PDF::loadView('przedsiebiorca.print_cars', ['przedsiebiorca' => $przedsiebiorca,'dok'=> $dok, 'cars'=>$cars, 'stan' => $stan, 'rodzaje' =>$rodzaje ] );

        return $pdf->stream('wykazpojazdow_'.$request->route('nr_dok').'_'.date('d-m-Y H:i:s').'.pdf');

    }

    public function print_cars(Request $request, $id)
    {
        //
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);


        $rodzaje= DB::table('dok_przed')
        ->join('przedsiebiorca', 'przedsiebiorca.id', '=' ,'dok_przed.id_przed')
        ->join('rodzaj_przed', 'rodzaj_przed.id', "=", 'przedsiebiorca.id_osf')
        ->select('rodzaj_przed.*','dok_przed.*','przedsiebiorca.*')
        ->where('dok_przed.id_przed', '=', $request->route('id'))
        ->where('dok_przed.nr_dok', '=', $request->route('nr_dok'))
        ->get();



        return view('przedsiebiorca.print_cars', compact('przedsiebiorca','rodzaje'));


    }

    public function wypisy($id)
    {
        //
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();
        $wypisy = DB::table('dok_przed_wyp')->where('id_przed', $przedsiebiorca->id)->get();

        return view('przedsiebiorca.wypisy', compact('przedsiebiorca','dok','wypisy'));

    }

     public function pojazdy($id)
    {
        //
        $przedsiebiorca = \App\Przedsiebiorca::findOrFail($id);
        $dok = DB::table('dok_przed')->where('id_przed' , $przedsiebiorca->id)->get();

        return view('przedsiebiorca.pojazdy.create', compact('przedsiebiorca','dok'));


    }

    public function stare_zf()
    {
        $zdolnosc = \App\Zdolnosc::all();
        $dok = \App\DokumentyPrzed::all();

        return view('przedsiebiorca.zabezpieczenie.stare', compact('zdolnosc','dok'));
    }

    public function stare_bz()
    {
        $baza = \App\Baza::all();
        $dok = \App\DokumentyPrzed::all();

        return view('przedsiebiorca.baza.stare', compact('baza','dok'));
    }

    public function stare_oz()
    {
        $certyfikat = \App\Certyfikat::all();
        $dok = \App\DokumentyPrzed::all();

        return view('przedsiebiorca.zarzadzajacy.stare', compact('certyfikat','dok'));
    }

    public function stare_lic()
    {
        $certyfikat = \App\Certyfikat::all();
        $dok = \App\DokumentyPrzed::all();

        return view('przedsiebiorca.dokumenty.stare', compact('certyfikat','dok'));
    }


     public function search(Request $request)
     {
        $search = $request->get('search');
        //$przedsiebiorca = DB::Table('przedsiebiorca')->where('nazwisko','like','%'.$search.'%')->paginate(5);
        $rodzaje= DB::table('dok_przed')
             ->join('przedsiebiorca', 'przedsiebiorca.id', '=' ,'dok_przed.id_przed')
             ->join('rodzaj_przed', 'rodzaj_przed.id', "=", 'przedsiebiorca.id_osf')
             ->select('rodzaj_przed.*','dok_przed.*','przedsiebiorca.*')
             ->where('nazwisko','like','%'.$search.'%')
             ->orWhere('nazwa_firmy','like','%'.$search.'%')
             ->orWhere('nazwa','like','%'.$search.'%')
             ->orWhere('nip','like','%'.$search.'%')
             ->orWhere('nr_dok','like','%'.$search.'%')
             ->orWhere('rodz_dok','like','%'.$search.'%')
             ->paginate(15);

        if($search == null) {
            Alert::error('Proszę wpisać szukane wyrażenie. Pole nie może być puste !', '');
            $wyniki = '0';
            $brak = "";


        }elseif(count($rodzaje) == 0){
            $wyniki ='0';
            $brak = "Nie znaleziono wyrażenia: '".$search."' ";

            return view('przedsiebiorca.index', ['rodzaje' => $rodzaje, 'wyniki' =>$wyniki, 'brak' =>$brak]);
        }elseif(count($rodzaje) > 0) {
            $wyniki = count($rodzaje);
            $brak = "";
            return view('przedsiebiorca.index', ['rodzaje' => $rodzaje, 'wyniki' =>$wyniki, 'brak' =>$brak]);
        }
        return view('przedsiebiorca.index', ['rodzaje' => $rodzaje, 'wyniki' =>$wyniki, 'brak' =>$brak]);

     }

     public function zdarzenia()
     {

        $zdolnosc = \App\Zdolnosc::all();
        $baza = \App\Baza::all();
        $certyfikat = \App\Certyfikat::all();
        $dok = \App\DokumentyPrzed::all();

        return view('przedsiebiorca.zdarzenia', ['zdolnosc' => $zdolnosc, 'baza' => $baza, 'certyfikat' => $certyfikat, 'dok'=>$dok]);
     }

     public function rezygnacja(Request $request)
     {

        $rezygnuj = \App\Przedsiebiorca::findOrFail($request->id);


        $input = Input::all();
        $id = Input::get('idr');

        $rezygnuj_lic = DB::table('dok_przed')->where('id_przed' , $request->id)->get();
        foreach($rezygnuj_lic as $li){
            $li->id;
        }
        $powod = Input::get('powod');
        $dat_rez = Input::get('dat_rez');
        $lic = \App\DokumentyPrzed::findOrFail($li->id);
        $lic->update(['status'=>'3','dat_rez'=> $dat_rez,'powod'=>$powod]);


        $data_zm = date('Y-m-d');
        $historia_zm = \App\ZmianyPrzed::create(['id_przed' => $li->id_przed, 'id_dok_przed' => $li->id, 'nazwa_zm' => 'Rezygnacja - Wycofanie z licencji/zezwolenia decyzja z dn. '.$dat_rez,'data_zm' => $data_zm]);

        Alert::error('Rezygnacja z licencji/zezwolenia przedsiębiorcy', '');
        return redirect('/przedsiebiorca');
    }


}
