<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wypisy extends Model
{
    //
    public $table = 'dok_przed_wyp';
    protected $fillable = ['id_dok_przed','id_przed','nazwa', 'rodzaj_wyp', 'nr_wyp', 'nr_druku','nr_sprawy', 'data_wn', 'data_wyd', 'status', 'dat_dep_wp', 'dat_dep_wyd', 'uwagi'];
}
