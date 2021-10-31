<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WykazPoj extends Model
{
    //
    public $table = 'wykaz_poj';
    protected $fillable = ['id_przed','id_dok_przed', 'rodzaj_poj', 'marka', 'nr_rej','p_nr_rej', 'nr_vin', 'dmc', 'wlasnosc', 'data_wpr', 'data_wyc', 'status', 'stan', 'uwagi'];
}
