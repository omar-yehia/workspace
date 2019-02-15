<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{


//    Authentication
    public function __construct()
    {
        $this->middleware('auth');
    }


// search by search form
//    public function searchUser2(Request $request)
//    {
//        $userNameMatch = User::where('user_name', 'like', '%' . $request->searchWord . '%')->get();
//        $userCityMatch = User::where('user_city', 'like', '%' . $request->searchWord . '%')->get();
//        return [$userNameMatch, $userCityMatch];
//    }


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

//        if(Auth::user()->user_type==){

        $userReservations = Reservation::where('user_id', Auth::user()->user_id)->get();
        return view('workspace.pages.userProfile', compact('userReservations'));

//        }
    }


    public function create(Request $request)
    {

        if (Auth::user()->user_type == 1) {

            $this->validate($request,[
                'name' => [
                    'required',
                    'regex:/^[a-zA-Z0-9]*([a-zA-Z][0-9]|[0-9][a-zA-Z])[a-zA-Z0-9]*$/'
                ]
                ,
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'user_mobile' => 'required|min:11|max:11|regex:/(01)[0-9]{9}/',
                'user_type' => 'required|in:1,2,3',

            ]);


            $newUser = new User();
            $newUser->name = $request->input('name');
            $newUser->password = Hash::make($request->input('password'));
            $newUser->email = $request->input('email');
            $newUser->user_mobile = $request->input('user_mobile');
            $newUser->user_type = $request->input('user_type');

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

            $this->validate($request,[
                'name' => [
                    'required',
                    'regex:/^[a-zA-Z0-9]*([a-zA-Z][0-9]|[0-9][a-zA-Z])[a-zA-Z0-9]*$/'
                ]
                ,
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'user_mobile' => 'required|min:11|max:11|regex:/(01)[0-9]{9}/',
                'user_type' => 'required|in:1,2,3',

//                Rule::in([1,2,3]),

            ]);

            $user = User::find($request->user_id);

            $user->name = $request->name;
            $user->password = $request->password;

//            if($user->email != $request->email){
//                $user->email = $request->email;
//            }

            $user->user_mobile = $request->user_mobile;
            $user->user_type = $request->user_type;

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
