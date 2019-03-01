<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role','alamat','no_hp','foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages(){
        return $this->hasMany('App\Message');
    }

    public function komoditas(){
        return $this->hasMany('App\Komoditas','id_ahlipraktisi');
    }

    public function groupfarm(){
        return $this->hasOne('App\Assignfarm','id_farm_manager');
    }
}
