<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    public $timestamps = false;
    protected $primaryKey = 'user_id';

    public function reservation()
    {
        return $this->hasMany('App\Reservation','reservation_id');
    }

    public function space()
    {
        return $this->hasMany('App\Space','space_id');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_mobile', 'user_type','user_image_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
