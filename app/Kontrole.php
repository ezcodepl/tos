<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontrole extends Model
{
    //
    public $table = 'kontrole';
    protected $fillable = ['id_przed', 'id_dok_przed', 'nazwa', 'nr_sprawy', 'dat_zawiad', 'dat_roz', 'dat_zak','nr_upo','kto','wynik','zalecenia','dat_zal','wyn_pokont','dat_ost_kont','uwagi'];
}
