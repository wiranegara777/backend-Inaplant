<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $fillable = ['jumlah_pohon', 
    'varietas','siklus_pertumbuhan','panen_pertama','panen_terakhir',
    'jumlah_produksi_pertahun','latitude_longtitude_1','latitude_longtitude_2',
    'latitude_longtitude_3','latitude_longtitude_4','id_farm_manager'
];

public function varietas(){
    return $this->hasOne('App\Varietas','id','varietas');
}

}


