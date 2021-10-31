<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('start');
}); 

Route::get('check_system', function () {
    return view('check_system');
});

Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/cars', 'App\Http\Controllers\PrzedsiebiorcaController@cars')->name('cars');
Route::patch('/przedsiebiorca/pojazdy/wycofaj/{id}', '\App\Http\Controllers\WykazPojController@wycofaj')->name('wycofaj');
Route::patch('/przedsiebiorca/{id}/dokument/{nr_dok}/wypisy/depozyt/', '\App\Http\Controllers\WypisyController@depozyt')->name('depozyt');
Route::patch('/przedsiebiorca/{id}/dokument/{nr_dok}/wypisy/depozytwyd/', '\App\Http\Controllers\WypisyController@depozytwyd')->name('depozytwyd');
Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/wypisy/', '\App\Http\Controllers\WypisyController@index')->name('index');
Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/wypisy/edit', '\App\Http\Controllers\WypisyController@update')->name('update');

Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/pdf/', 'App\Http\Controllers\PrzedsiebiorcaController@gPDF');
Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/wypisyPDF/', '\App\Http\Controllers\WypisyController@wypisyPDF');
Route::get('/przedsiebiorca/zabezpieczenie/stare', 'App\Http\Controllers\PrzedsiebiorcaController@stare_zf')->name('stare_zf');

Route::get('/search', 'App\Http\Controllers\PrzedsiebiorcaController@search');
Route::get('/przedsiebiorca/{id}/zmiany/{nr_dok}', '\App\Http\Controllers\ZmianyPrzedController@index')->name('index');
Route::get('/przedsiebiorca/baza/stare', 'App\Http\Controllers\PrzedsiebiorcaController@stare_bz')->name('stare_bz');
Route::get('/przedsiebiorca/zarzadzajacy/stare', 'App\Http\Controllers\PrzedsiebiorcaController@stare_oz')->name('stare_oz');
Route::get('/przedsiebiorca/dokumenty/stare', 'App\Http\Controllers\PrzedsiebiorcaController@stare_lic')->name('stare_lic');

Route::get('/przedsiebiorca/pisma/print_zdol_finans/{id}', '\App\Http\Controllers\PismaController@print_zdol_finans');
Route::get('/przedsiebiorca/pisma/print_zarzadzajacy/{id}', '\App\Http\Controllers\PismaController@print_zarzadzajacy');


Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/pisma/zabezpieczenie/tresc/', '\App\Http\Controllers\PismaController@tresc');
Route::post('/przedsiebiorca/pisma/podglad/{id}', '\App\Http\Controllers\PismaController@pismo_gotowe')->name('pismo_gotowe');
Route::get('/przedsiebiorca/pisma/zf_pdf/{id}', '\App\Http\Controllers\PismaController@zf_pdf');

Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/pisma/zarzadzajacy/tresc/', '\App\Http\Controllers\PismaController@pismo_zarzadzajacy')->name('pismo_zarzadzajacy');
Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/pisma/baza/tresc/', '\App\Http\Controllers\PismaController@pismo_baza')->name('pismo_baza');
Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/pisma/zarzadzajacy/printPDF/', '\App\Http\Controllers\PismaController@print_zarzadzajacy')->name('print_zarzadzajacy');
Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/pisma/baza/printPDF/', '\App\Http\Controllers\PismaController@print_baza')->name('print_baza');

Route::get('/przedsiebiorca/zdarzenia', 'App\Http\Controllers\PrzedsiebiorcaController@zdarzenia');
Route::patch('/przedsiebiorca/{id}/dokument/{nr_dok}/zawies/', 'App\Http\Controllers\PrzedsiebiorcaController@zawies')->name('zawies');
Route::patch('/przedsiebiorca/{id}/dokument/{nr_dok}/odwies/', 'App\Http\Controllers\PrzedsiebiorcaController@odwies')->name('odwies');
Route::patch('/przedsiebiorca/{id}/dokument/{nr_dok}/rezygnacja/', 'App\Http\Controllers\PrzedsiebiorcaController@rezygnacja')->name('rezygnacja');

Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}', 'App\Http\Controllers\PrzedsiebiorcaController@show')->name('show');

//Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/edit/', 'PrzedsiebiorcaController@edit');

Route::post('destroy/{id}', '\App\Http\Controllers\WypisyController@destroy');

Route::get('/przedsiebiorca/{id}/dokument/{nr_dok}/kontrole/edit/', '\App\Http\Controllers\kontrole\Kontrole@edit');

Route::resource('kontrole', '\App\Http\Controllers\kontrole\Kontrole');
Route::resource('raporty', '\App\Http\Controllers\raporty\Raporty');

Route::get('/przedsiebiorca/kontrole/new_harmo', 'kontrole\Kontrole@create_harmo')->name('create_harmo');
Route::get('/przedsiebiorca/kontrole/{id}/{nr_dok}/', 'kontrole\Kontrole@details')->name('details');
Route::get('/przedsiebiorca/kontrole/new_zaw/{id}/{nr_dok}/', 'kontrole\Kontrole@new_zaw')->name('new_zaw');
Route::get('/przedsiebiorca/kontrole/new_upo/{id}/{nr_dok}/', 'kontrole\Kontrole@new_upo')->name('new_upo');

Route::resource('przedsiebiorca/zmiany', '\App\Http\Controllers\ZmianyPrzedController');

Route::resource('przedsiebiorca/baza', '\App\Http\Controllers\BazaController');

Route::resource('przedsiebiorca/dokumenty', '\App\Http\Controllers\DokPrzedController');

Route::resource('przedsiebiorca/zarzadzajacy', '\App\Http\Controllers\CertController');

Route::resource('przedsiebiorca/zabezpieczenie', '\App\Http\Controllers\ZdolnoscController');

Route::resource('przedsiebiorca/wypisy', '\App\Http\Controllers\WypisyController');

Route::resource('przedsiebiorca/pojazdy', '\App\Http\Controllers\WykazPojController');

Route::resource('przedsiebiorca', 'App\Http\Controllers\PrzedsiebiorcaController');

// Routing - OSK

Route::resource('osk', '\App\Http\Controllers\osk\OskController');
Route::get('szkoly', '\App\Http\Controllers\osk\OskController@szkoly')->name('szkoly');


Route::resource('instruktor', '\App\Http\Controllers\osk\InstruktorController');
Route::post('instruktor/{id}','\App\Http\Controllers\osk\InstruktorController@update')->name('instruktor.update');

Route::resource('kategorie', '\App\Http\Controllers\osk\KategorieController');
Route::post('kategorie/{id}/edit','\App\Http\Controllers\osk\KategorieController@update')->name('kategorie.update');

// End Routing - OSK

// Routing - SKP

Route::resource('skp', '\App\Http\Controllers\skp\SkpController');
