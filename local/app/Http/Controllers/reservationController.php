<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class reservationController extends Controller
{
      public function reservation_form($selected_service){
 

            $services = DB::table("tbl_package_menu")
                ->orderby("name")
                ->orderby("category")
                ->get();

            return view("frontEnd.reservation_form")
                    ->with("services", $services)
                    ->with("selected_service", $selected_service)
                    ;

      }

      public function reservation_customer(Request $request){

          $cust_id = DB::table("tbl_customer")
                ->insertGetId([
                    "last_name" => $request->last_name,
                    "first_name" => $request->first_name,
                    "middle_name" => $request->mid_name,
                    "contact_no" => $request->contact,
                    "email" => $request->email
                ]);
                DB::table("tbl_reservation")
                ->insert([
                    "customer_id" => $cust_id,
                    "package_id" => $request->package,
                    "message" => $request->message,
                    "status" => 0,
                ]);
            return json_encode($cust_id);
      }

      public function finalize_order($id){  
            $tbl_cust = DB::table("tbl_customer")
                ->where("id", $id)
                ->first();

            $tbl_reservation = DB::table("tbl_reservation")
                ->select("tbl_reservation.*", "name")
                ->where("customer_id", $id)
                ->join("tbl_package_menu", "tbl_package_menu.id", "=","tbl_reservation.package_id")
                ->first();

            $tbl_package = DB::table("tbl_package_menu")
                ->orderBy("name")
                ->orderBy("category")
                ->get();

            $tbl_add_on = DB::table("tbl_add_ons")        
                ->orderBy("name")    
                ->get();

            $initial_order = DB::table("tbl_package_menu")
                ->where("id", $tbl_reservation->package_id)
                ->first();


                return view("frontEnd.reservation_finalize")
                    ->with("tbl_cust", $tbl_cust)
                    ->with("tbl_reservation", $tbl_reservation)
                    ->with("tbl_package", $tbl_package)
                    ->with("tbl_add_on", $tbl_add_on)
                    ->with("initial_order", $initial_order)
                    
                    ;
      }


}
