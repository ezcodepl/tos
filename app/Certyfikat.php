<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certyfikat extends Model
{
    //
    public $table = 'cert_komp';
    protected $fillable = ['id_przed', 'id_dok_przed','rodzaj','nr_cert', 'imie_os_z','nazwisko_os_z','adres', 'miasto', 'dat_ur', 'dat_wyd', 'os_zarz','umowa','dat_umowy', 'uwagi'];
}
