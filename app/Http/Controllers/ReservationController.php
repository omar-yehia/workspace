<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{


//    Authentication
    public function __construct()
    {
        $this->middleware('auth');
    }


//    get all reservations
    public function index()
    {

        if (Auth::user()->user_type == 1) {
            $reservations = Reservation::all();
            return view('workspace.cruds.reservationCrud', compact('reservations'));
        }
        return back();
    }


    public function create(Request $request)
    {
        $this->validate($request,[
            'space_id' => 'required|numeric',
            'room_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'reservation_date' => 'required|string|date',
            'space_number_of_rooms' => 'required|numeric',
            'reservation_from_hour' => 'required|numeric',
            'reservation_to_hour' => 'required|numeric',
            'number_of_chairs_reserved' => 'required|numeric',
        ]);

//        $space;
//        $room;
//        $space;

        $newReservation = new Reservation();
        $newReservation->space_id = $request->input('space_id');
        $newReservation->room_id = $request->input('room_id');
        $newReservation->user_id = $request->input('user_id');
        $newReservation->reservation_date = $request->input('reservation_date');
        $newReservation->reservation_from_hour = $request->input('reservation_from_hour');
        $newReservation->reservation_to_hour = $request->input('reservation_to_hour');
        $newReservation->number_of_chairs_reserved = $request->input('number_of_chairs_reserved');


        $newReservation->save();

        return back()->with('message', 'Reservation Done Successfuly!');
    }


    public function edit($reservationId)
    {
        $reservation = Reservation::find($reservationId);
        if (isset($reservation)) {
            if (($reservation->user_id == Auth::user()->user_id) || (Auth::user()->user_type == 1)) {
                return view('workspace.cruds.editReservation', compact('reservation'));
            }
        }
        return back();
    }


    public function update(Request $request)
    {

        $this->validate($request,[
            'space_id' => 'required|numeric',
            'room_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'reservation_date' => 'required|string|date',
            'space_number_of_rooms' => 'required|numeric',
            'reservation_from_hour' => 'required|numeric',
            'reservation_to_hour' => 'required|numeric',
            'number_of_chairs_reserved' => 'required|numeric',
        ]);

        $reservation = Reservation::find($request->reservation_id);

        if (isset($reservation)) {
            if (($reservation->user_id == Auth::user()->user_id) || (Auth::user()->user_type == 1)) {
                $reservation->space_id = $request->input('space_id');
                $reservation->room_id = $request->input('room_id');
                $reservation->user_id = $request->input('user_id');
                $reservation->reservation_date = $request->input('reservation_date');
                $reservation->reservation_from_hour = $request->input('reservation_from_hour');
                $reservation->reservation_to_hour = $request->input('reservation_to_hour');
                $reservation->number_of_chairs_reserved = $request->input('number_of_chairs_reserved');

                $reservation->save();

                return redirect('reservationCrud');

            }
        }
        return back();

    }



    public function destroy($reservationId)
    {
        $reservation = Reservation::find($reservationId);
        if (isset($reservation)) {
            if (($reservation->user_id == Auth::user()->user_id) || (Auth::user()->user_type == 1)) {
                $reservation->delete();
                return back()->with('deleted', 'Deleted');
            }
        }
        return back();
    }


}
