<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupfarm extends Model
{
    protected $fillable = ['komoditas', 'id_pemilik_lahan','name'];
}
