<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instruktor extends Model
{
    //
    public $table = 'osk_instruktorzy';
    protected $fillable = ['id_osk','nr_upr','p_nr_upr','dat_w','nr_leg','p_nr_leg','imie','nazwisko','adres','pesel','dat_w_leg','dat_skr','powod','warsztaty','orz_lek','orz_psy','tel','email','status','uwagi','created_at','updated_at'];
}
