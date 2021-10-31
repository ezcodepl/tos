<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zdolnosc extends Model
{
    //
    public $table = 'zdol_finans';
    protected $fillable = ['id_przed', 'id_dok_przed','nazwa', 'numer', 'data_od','data_do','ile_poj', 'suma_zab', 'status', 'uwagi'];
}
