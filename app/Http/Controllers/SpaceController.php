<?php

namespace App\Http\Controllers;

use App\Space;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class SpaceController extends Controller
{

//    Authentication
    public function __construct()
    {
        $this->middleware('auth')->except('governorateSpaces');
    }


//    governorates List
    const governoratesList = ['Cairo', 'Alexandria', 'Asyut', 'Beheira', 'Beni Suef', 'Dakahlia', 'Damietta', 'Faiyum', 'Gharbia', 'Giza', 'Ismailia', 'Kafr El Sheikh', 'Luxor', 'Matruh', 'Minya', 'Monufia', 'New Valley', 'North Sinai', 'Port Said', 'Qalyubia', 'Qena', 'Red Sea', 'Sharqia', 'Sohag', 'South Sinai', 'Suez'];


//    any one can see
    public function governorateSpaces(Request $request)
    {
        $governorateSelected = $request->selectedGovernorate;
        $spacesInGovernorate = Space::where('space_city', $governorateSelected)->get();
        $governoratesList = self::governoratesList;

//        return view('workspace.pages.spacesFromSelectMenu',compact('spacesInGovernorate')) ;
        return view('workspace.index', compact('spacesInGovernorate', 'governoratesList', 'governorateSelected'));
    }


//    get all spaces
    public function index()
    {
        //        if Admin
        if (Auth::user()->user_type == 1) {
            $spaces = Space::paginate(5);
        } //        if Owner
        elseif (Auth::user()->user_type == 2) {
            $spaces = Space::where('owner_user_id', Auth::user()->user_id)->paginate(5);
        } else {
            return back();
        }

        $governoratesList = self::governoratesList;
        return view('workspace.cruds.spaceCrud', compact('spaces', 'governoratesList'));
    }


    public function create(Request $request)
    {

        if ($request->input('space_owner_name') == Auth::user()->name || Auth::user()->user_type == 1) {


            $this->validate($request, [
                'space_name' => 'required|string|unique:spaces',
                'space_city' => 'required|string',
                'space_owner_name' => 'required|string',
                'space_address' => 'required|string',
                'space_number_of_rooms' => 'required|numeric',
                'space_image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);



            $user = User::where('name', $request->input('space_owner_name'))->get();

            $ImageFile = $request->file('space_image_path');
            $destinationPath = public_path('/images');
            $radomNumber = rand(1, 90);
            $ImageName = $radomNumber . $ImageFile->getClientOriginalName();
            $ImageFile->move($destinationPath, $ImageName);


            $newSpace = new Space();
            $newSpace->space_name = $request->input('space_name');
            $newSpace->owner_user_id = $user[0]->user_id;
            $newSpace->space_city = $request->input('space_city');
            $newSpace->space_address = $request->input('space_address');
            $newSpace->space_number_of_rooms = $request->input('space_number_of_rooms');
            $newSpace->space_image_path = $ImageName;
            $newSpace->space_rating = 3;
            $newSpace->save();
        }

        return back();
    }


    public function edit($spaceId)
    {
        $space = Space::find($spaceId);

        if (($space->owner_user_id == Auth::user()->user_id) || (Auth::user()->user_type == 1)) {
            $governoratesList = self::governoratesList;
            return view('workspace.cruds.editSpace', compact('space', 'governoratesList'));
        }

        return back();
    }


    public function update(Request $request)
    {


        $user = User::where('name', $request->input('space_owner_name'))->get();

        $space = Space::find($request->space_id);

        if (($space->owner_user_id == Auth::user()->user_id) || (Auth::user()->user_type == 1)) {

            $this->validate($request, [
                'space_name' => 'required|string',
                'space_city' => 'required|string',
                'space_owner_name' => 'required|string',
                'space_address' => 'required|string',
                'space_number_of_rooms' => 'required|numeric',
                'space_image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


            $ImageFile = $request->file('space_image_path');
            $destinationPath = public_path('/images');
            $radomNumber = rand(1, 90);
            $ImageName = $radomNumber . $ImageFile->getClientOriginalName();
            $ImageFile->move($destinationPath, $ImageName);

            $space->space_name = $request->space_name;
            $space->owner_user_id = $user[0]->user_id;
            $space->space_city = $request->space_city;
            $space->space_address = $request->space_address;
            $space->space_number_of_rooms = $request->space_number_of_rooms;
            $space->space_image_path = $ImageName;
            $space->space_rating = 3;
            $space->save();

            return redirect('spaceCrud');

        }

        return back();
    }


    public function destroy($spaceId)
    {

        $space = Space::find($spaceId);
        if (($space->owner_user_id == Auth::user()->user_id) || (Auth::user()->user_type == 1)) {

            $space->delete();
            return back()->with('deleted', 'Deleted');
        }
        return back();
    }


}



////################################################
/////NOT USED // HASHED
////################################################


//// search by search form
//    public function searchSpace2(Request $request)
//    {
//        $spaceNameMatch = Space::where('space_name', 'like', '%' . $request->searchWord . '%')->get();
//        $spaceCityMatch = Space::where('space_city', 'like', '%' . $request->searchWord . '%')->get();
//        return [$spaceNameMatch, $spaceCityMatch];
//    }

//
////    Live search using ajax [TEST]!!!
//    public function searchSpace(Request $request)
//    {
//        if ($request->ajax()) {
//            $output = "";
//            $spaces = DB::table('spaces')->where('space_name', 'LIKE', '%' . $request->spaceName . "%")->get();
//            if ($spaces) {
//                foreach ($spaces as $space) {
//                    $output .= '<tr>' .
//                        '<td>' . $space->space_id . '</td>' .
//                        '<td>' . $space->space_name . '</td>' .
//                        '<td>' . $space->space_city . '</td>' .
//                        '<td>' . $space->space_address . '</td>' .
//                        '</tr>';
//                }
//                return Response($output);
//            }
//        } else {
//            echo 'not ajax';
//        }
//    }


/// //    public function getCities()
////    {
////        $cities = Space::distinct('space_city')->get();
////        $cities = DB::table('spaces')
////            ->select('space_city')
////            ->distinct()
////            ->get();
////        return $cities;
////    }


//        $spaceData = array(
//            'space_name' => Input::get('space_name'),
//            'owner_user_id' => Input::get('space_owner'),
//            'space_city' => Input::get('space_city'),
//            'space_address' => Input::get('space_address'),
//            'space_number_of_rooms' => Input::get('space_number_of_rooms'),
//            'space_image_path' => Input::get('space_image_path')
//            );
//        Space::create($spaceData );

//    public function create($formValues)
//    {
//        //
////        $userData = array('username' => 'Me', 'email' => 'me@yahoo.com');
////        User::create($userData);
//        $spaceData = array(
//            'space_name' => $formValues->space_name,
//            'space_owner' => $formValues->space_owner,
//            'space_city' => $formValues->space_city,
//            'space_address' => $formValues->space_address,
//            'space_number_of_rooms' => $formValues->space_number_of_rooms,
//            'space_image_path' => $formValues->space_image_path
//        );
//        Space::create($spaceData );
//
//    }
