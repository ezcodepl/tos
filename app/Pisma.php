<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pisma extends Model
{
    //
    public $table = 'pisma';
    protected $fillable = ['nazwa', 'tresc', 'nr_sprawy', 'data_p', 'id_przed'];

}
