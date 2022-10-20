<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Datatables;

class admin_reservationController extends Controller
{
        public function genTable(){
            $reservation = DB::table("tbl_reservation")
                ->join("tbl_customer", "tbl_customer.id", "=", "tbl_reservation.customer_id")
                ->get();

            return $reservation;



        }


}
