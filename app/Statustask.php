<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statustask extends Model
{
    protected $fillable = ['id_farm_manager', 'id_task','status'];
}
