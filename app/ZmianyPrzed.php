<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZmianyPrzed extends Model
{
    //
    public $table = 'hist_zmian_przed';
    protected $fillable = ['id_przed','id_dok_przed', 'nazwa_zm', 'data_zm'];
}
