<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategorieIns extends Model
{
    //
    public $table = 'osk_kat_inst';
    protected $fillable = ['id_inst','nr_upr','kat_a','dat_a','kat_am','dat_am','kat_a1','dat_a1','kat_a2','dat_a2','kat_b','dat_b','kat_b1','dat_b1','kat_be','dat_be','kat_c','dat_c','kat_c1','dat_c1','kat_c1e','dat_c1e','kat_ce','dat_ce','kat_d','dat_d','kat_d1','dat_d1','kat_d1e','dat_d1e','kat_de','dat_de','kat_t','dat_t','kat_t1','dat_t1','uwagi','created_at','updated_at'];
}
