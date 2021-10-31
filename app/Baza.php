<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baza extends Model
{
    public $table = 'baza_eksp';
    protected $fillable = ['id_przed', 'id_dok_przed','rodzaj', 'adres', 'kod_p', 'miasto', 'gmina', 'wlasnosc', 'umowa', 'dat_umowy', 'uwagi'];

}
