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

                if($tbl_reservation == null ){
                    $services = DB::table("tbl_package_menu")
                    ->orderby("name")
                    ->orderby("category")
                    ->get();

                    return view("frontEnd.reservation_form")
                    ->with("services", $services)
                    ->with("selected_service", "all");
                }

            $check_order = DB::table("tbl_order")
                ->where("reservation_id", $tbl_reservation->id)
                ->count("id");

                if($check_order > 0 ){
                    $services = DB::table("tbl_package_menu")
                    ->orderby("name")
                    ->orderby("category")
                    ->get();

                    return view("frontEnd.reservation_form")
                    ->with("services", $services)
                    ->with("selected_service", "all");
                }

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


      public function add_order(Request $request){

        $order = DB::table("tbl_package_menu")
                ->where("id", $request->id)
                ->first();
        return json_encode($order);

      }

      public function add_addon(Request $request){

        $order = DB::table("tbl_add_ons")
                ->where("id", $request->id)
                ->first();
        return json_encode($order);

      }

      public function submit_order(Request $request){

      
            $total_price = 0;
        foreach($request->order as $order){
            $data = explode(':',$order);
            $menu_id = $data[0];
            $order_qty = $data[1];
            $order_price = $data[2];
            $type = $data[3];

            if($type == "addon"){
                $menu_id = 0;
                $add_on = $menu_id;
            }else{
                $menu_id = $menu_id;
                $add_on = 0;
            }

            $total_price += ($order_qty*$order_price);

            DB::table("tbl_order")
                ->insert([
                    "reservation_id"=> $request->reservation_id,
                    "menu_id" => $menu_id,
                    "add_on_id" => $add_on,
                    "qty" => $order_qty,
                    "price" => $order_price
                ]);
        }


          DB::table("tbl_reservation")
                ->where("id", $request->reservation_id)
                ->update([
                    "date_reserved" => date("Y-m-d", strtotime($request->event_date)),
                    "time_reserved" => date("H:i:s", strtotime($request->event_time)),
                    "no_of_packs" => $request->no_packs,
                    "location_type" => $request->location,
                    "total_price" => $total_price,
                    "status" => "1"
                ]);

            return json_encode("Reservation Submit");
      }



}
