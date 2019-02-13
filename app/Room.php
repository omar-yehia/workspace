<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'room_id';

    protected  $fillable = ['space_id','room_name','available_chairs',
    'chair_price_per_hour','room_image_path'];
    /**
     * Get the reservation that is owned by this user.
     */

    public function space()
    {
        return $this->belongsTo('App\Space','space_id');
    }

}

//    public function user()
//    {
//        return $this->belongsToMany('App\User');
//    }
//
//    public function space()
//    {
//        return $this->belongsTo('App\Space');
//    }
//
//    public function reservation()
//    {
//        return $this->belongsToMany('App\Reservation');
//    }





