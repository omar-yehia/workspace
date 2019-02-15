<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class LiveSearch extends Controller
{
    function index()
    {
        return view('live_search');
    }

    function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('spaces')
                    ->where('space_name', 'like', '%' . $query . '%')
                    ->orWhere('space_city', 'like', '%' . $query . '%')
                    ->orderBy('space_city')
                    ->get();

            } else {
                $data = DB::table('spaces')
                    ->orderBy('space_city')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
        <tr>
         <td>' . $row->space_id . '</td>
         <td>' . $row->space_name . '</td>
         <td>' . $row->space_city . '</td>
         <td>' . $row->owner_user_id . '</td>
         <td>' . $row->space_number_of_rooms . '</td>
        </tr>
        ';
                }
            } else {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row
            );

            echo json_encode($data);
        }
    }
}
