<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $fillable = ['name', 'id_pemilik_lahan','id_farm_manager','id_ahli_praktisi'];
}
