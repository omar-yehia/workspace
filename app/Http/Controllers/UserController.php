<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Space;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{


//    Authentication
    public function __construct()
    {
        $this->middleware('auth');
    }

//    USERS ROLES
//    Admin 1
//    Owner 2
//    User 3





//    get all users
    public function index()
    {
        if (Auth::user()->user_type == 1) {
            $users = User::paginate(5);
            return view('workspace.cruds.userCrud', compact('users'));
        }
        return back();
    }


    public function userProfile()
    {

//        if owner get the reservations of spaces he owns
        if (Auth::user()->user_type == 2) {

            $ownerSpaces = Space::where('owner_user_id', Auth::user()->user_id)->get();

            if (!$ownerSpaces->isEmpty()) {

                $clientsReservationsColl = new Collection();

                foreach ($ownerSpaces as $ownerSpace) {
                    $clientsReservationsColl = $clientsReservationsColl->merge(Reservation::where('space_id', $ownerSpace->space_id)->get() );
                }

//                return  $clientsReservationsColl;

                $userReservations = $clientsReservationsColl;
//                return view('workspace.pages.userProfile', compact('userReservations'));

            }

//            else {
//                return view('workspace.pages.userProfile', compact('userReservations'));
//            }

        }
        elseif (Auth::user()->user_type == 3) {
            $userReservations = Reservation::where('user_id', Auth::user()->user_id)->get();
//            return view('workspace.pages.userProfile', compact('userReservations'));
        }

        return view('workspace.pages.userProfile', compact('userReservations'));

    }


    public function create(Request $request)
    {

        if (Auth::user()->user_type == 1) {

            $this->validate($request, [
                'name' => [
                    'required',
                    'regex:/^[a-zA-Z0-9]*([a-zA-Z][0-9]|[0-9][a-zA-Z])[a-zA-Z0-9]*$/'
                ]
                ,
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'user_mobile' => 'required|min:11|max:11|regex:/(01)[0-9]{9}/',
                'user_type' => 'required|in:1,2,3',
                'user_image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $ImageFile = $request->file('user_image_path');
            $destinationPath = public_path('/images');
            $radomNumber = rand(1, 90);
            $ImageName = $radomNumber . $ImageFile->getClientOriginalName();
            $ImageFile->move($destinationPath, $ImageName);



            $newUser = new User();
            $newUser->name = $request->input('name');
            $newUser->password = Hash::make($request->input('password'));
            $newUser->email = $request->input('email');
            $newUser->user_mobile = $request->input('user_mobile');
            $newUser->user_type = $request->input('user_type');
            $newUser->user_image_path = $ImageName;

            $newUser->save();

        }
        return back();
    }


    public function edit($userId)
    {
        if (Auth::user()->user_type == 1) {
            $user = User::find($userId);
            return view('workspace.cruds.editUser', compact('user'));
        }
        return back();
    }

    public function update(Request $request)
    {


        if (Auth::user()->user_type == 1) {

            $this->validate($request, [
                'name' => [
                    'required',
                    'regex:/^[a-zA-Z0-9]*([a-zA-Z][0-9]|[0-9][a-zA-Z])[a-zA-Z0-9]*$/'
                ]
                ,
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6',
                'user_mobile' => 'required|min:11|max:11|regex:/(01)[0-9]{9}/',
                'user_type' => 'required|in:1,2,3',
                'user_image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

//                Rule::in([1,2,3]),

            ]);




            $ImageFile = $request->file('user_image_path');
            $destinationPath = public_path('/images');
            $radomNumber = rand(1, 90);
            $ImageName = $radomNumber . $ImageFile->getClientOriginalName();
            $ImageFile->move($destinationPath, $ImageName);



            $user = User::find($request->user_id);

//            $user->update(array(
//            "name" => $request->name,
//            "password" => $request->password,
////            "email" => $request->email,
//            "user_mobile" => $request->user_mobile
//                )
//            );

            $user->name = $request->name;
            $user->password = $request->password;

//            if($user->email != $request->email){
//                $user->email = $request->email;
//            }

            $user->user_mobile = $request->user_mobile;
            $user->user_type = $request->user_type;
            $user->user_image_path= $ImageName;


            $user->save();

            return redirect('userCrud');
        }
        return back();
    }


    public function destroy($userId)
    {
        if (Auth::user()->user_type == 1) {
            User::find($userId)->delete();
            return back()->with('deleted', 'Deleted');
        }
        return back();
    }


}






// Test Codes just for Refrence



// search by search form
//    public function searchUser2(Request $request)
//    {
//        $userNameMatch = User::where('user_name', 'like', '%' . $request->searchWord . '%')->get();
//        $userCityMatch = User::where('user_city', 'like', '%' . $request->searchWord . '%')->get();
//        return [$userNameMatch, $userCityMatch];
//    }


//                $clientsReservationsFinal = new Reservation();
//                $clientsReservationsFinal->fill($clientsReservations);

//                $clientsReservationsFinal::hydrate($clientsReservations);


//                return  $clientsReservations;
//                    ->space->space_id;
