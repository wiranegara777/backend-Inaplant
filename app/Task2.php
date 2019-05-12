<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task2 extends Model
{
    protected $fillable = ['id_pemilik_lahan', 'title','description','start_date','end_date'];

}
