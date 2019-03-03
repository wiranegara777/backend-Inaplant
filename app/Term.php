<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $fillable = ['id_pemilik_lahan', 'name','start_date','end_date'];
}
