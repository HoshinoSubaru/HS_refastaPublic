<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use DB;


class AutoCompleteController extends Controller
{

        public function ResultSearch(Request $request, Response $response)
        {

            $term = $request->term;

            $results = array();

            $data = DB::table("mst_brand")->where('name','like','%'.$term.'%')->take(10)->get();

            foreach ( $data as $item){

                $results[] = ['label' => $item->name, 'value' => $item->id];

            }

            return $results;

        }


}
