<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Type_List;

use DB;
class GetListController extends BaseController
{
    
    function getList_type() {

        $list_type = DB::table('type_qes')->get();
        return response()->json($list_type);
    }
    function getList_stos() {

        $list_stos = DB::table('stos')->get();
        return response()->json($list_stos);
    }

    function getList_designator() {

        $list_designator = DB::table('designators')->get();
        return response()->json($list_designator);
    }

    function getList_mitra() {
        $list_mitra = DB::table('mitras')->get();
        return response()->json($list_mitra);
    }

    

    }

   
    // public function login(Request $request) {
        
    // }

