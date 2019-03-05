<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['id_pemilik_lahan', 'title','description','id_term'];
}
