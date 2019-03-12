<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = ['name', 'id_group_farm','note','varietas','foto1','foto2','foto3','id_farm_manager','is_overdue'];

    public function varietas(){
        return $this->hasOne('App\Varietas','varietas');
    }
}
