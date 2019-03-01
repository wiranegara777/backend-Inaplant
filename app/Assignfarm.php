<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignfarm extends Model
{
    protected $fillable = ['id_farm_manager', 'id_group_farm'];

    public function user()
    {
        return $this->belongsTo('App\User','id_farm_manager');
    }
}
