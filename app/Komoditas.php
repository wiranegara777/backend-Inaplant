<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
    protected $fillable = ['komoditas', 'id_ahlipraktisi'];

    public function user(){
        return $this->belongsTo('App\User','id_ahlipraktisi');
    }
}
