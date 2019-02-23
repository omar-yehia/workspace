<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    protected $primaryKey = 'space_id';

    //

    protected $fillable=[
        'space_name','owner_user_id','space_city','space_address','space_number_of_rooms','space_image_path'
    ];

    public function reservation()
    {
        return $this->hasMany('App\Reservation','reservation_id');
    }

    public function room()
    {
        return $this->hasMany('App\Room','room_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','owner_user_id');
    }

}
//    public function user()
//    {
//        return $this->belongsToMany('App\User');
//    }
//
//    public function room()
//    {
//        return $this->hasMany('App\Room');
//    }
//
//    public function reservation()
//    {
//        return $this->hasMany('App\Reservation');
//    }

