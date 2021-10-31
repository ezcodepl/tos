<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Przedsiebiorca extends Model
{
    //
    public $table = 'przedsiebiorca';
    protected $fillable = ['nazwa_firmy','id_osf', 'imie', 'nazwisko', 'adres', 'miejscowosc', 'kod_p', 'gmina', 'nip', 'regon', 'telefon', 'email', 'status', 'uwagi'];

}
