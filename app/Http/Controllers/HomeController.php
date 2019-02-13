<?php

namespace App\Http\Controllers;

use App\Space;


class HomeController extends Controller
{

//
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }





    public function index()
    {

        $spaces = Space::all();
        $governoratesList = SpaceController::governoratesList;
        return view('workspace.index', compact(
            'spaces',
            'governoratesList'));
    }










//    test functions



//    public function SearchByName($searchName)
//    {
//        $spacesMatch = Space::where('space_name', 'like', '%'.$searchName.'%')->get();
////        $citiesMatch= Space::all()->where('space_city', 'like', '%'.$searchName.'%')->get('space_city');
//        $citiesMatch= Space::where('space_city', 'like', '%'.$searchName.'%')->get();
//        return [$spacesMatch,$citiesMatch] ;
//    }
//
//    public function testSearch($spaceName)
//    {
////         why % is not working :( ??
////        $value = '%{$spaceName}%';
////        :D finally it worked
//        $space = Space::where('space_name', 'like', '%'.$spaceName.'%')->get();
////        $space = Space::all()->where('space_id','=',1);
//
//        return $space;
//    }


}
