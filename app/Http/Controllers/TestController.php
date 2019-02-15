<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //
    public function searchTest (Request $request) {
    {
        // get the search term
        $text = $request->input('text');

        // search the members table
        $spaces = DB::table('spaces')->where('space_name', 'Like', $text)->get();


        // return the results
        return response()->json($spaces);
    }

    }

}
