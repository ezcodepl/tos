<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokumentyPrzed extends Model
{
    public $table = 'dok_przed';
    protected $fillable = ['id_przed','nazwa', 'rodz_dok', 'nr_dok', 'p_nr_dok','nr_druku', 'nr_sprawy', 'data_wn', 'data_wyd', 'dat_umowy', 'data_waz', 'powod', 'dat_zaw', 'dat_zaw_do','dat_rez', 'status','uwagi'];

}
