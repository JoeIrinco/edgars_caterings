<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class reservationController extends Controller
{
      public function reservation_form($services){
 
        if($services == "all"){
            $services = "%";
        }

            $services = DB::table("tbl_package_menu")
                ->where("id", "like", $services)
                ->orderby("name")
                ->orderby("category")
                ->get();

            return view("frontEnd.reservation_form")
                    ->with("services", $services)
                    ;

      }
}
