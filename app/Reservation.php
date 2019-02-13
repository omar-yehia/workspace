<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use App\Space;

class Reservation extends Model
{

    protected $primaryKey = 'reservation_id';
    protected $fillable = ['room_id', 'user_id', 'reservation_date',
        'reservation_from_hour', 'reservation_to_hour', 'number_of_chairs_reserved'];

    /**
     * Get the room for the reservation.
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function space()
    {
        return $this->belongsTo('App\Space', 'space_id');
    }

    public function room()
    {
        return $this->belongsTo('App\Room', 'room_id');
    }


}

//    public function user()
//    {
//        return $this->hasOne('App\User', 'foreign_key');
//    }
//
//    public function space()
//    {
//        return $this->belongsTo('App\Space', 'foreign_key');
//    }
//
//    public function room()
//    {
//        return $this->belongsToMany('App\Room', 'foreign_key');
//    }
//
//


/**
 * Get the space record associated with the reservation.
 */
//    public function space()
//    {
//        return $this->hasOne('App\Space','foreign_key');
//    }
//
//    public function room()
//    {
//        return $this->hasOne('App\Room','foreign_key');
//    }



