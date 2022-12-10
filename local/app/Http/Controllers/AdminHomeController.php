<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
class AdminHomeController extends Controller
{
    public function index(){
        return view('admin_view.home');
    }

    public function reservation(){
        return view('admin_view.reservation_list');
    }

    public function print_order($id){
        $cust_info = $this->get_info($id);
        $order_list = $this->getOrder($id);
        $pdf = PDF::loadView('admin_view.export', compact('order_list', 'cust_info'));
        // download PDF file with download method
        return $pdf->stream('order_list.pdf');
    }

    private function get_info($id){
        $tbl_ord =  DB::table("tbl_order")
            ->where("reservation_id", $id)
            ->first();
        $res_id = $tbl_ord->reservation_id;
        return DB::table("tbl_reservation")
            ->select("tbl_reservation.*","tbl_customer.last_name","tbl_customer.first_name","tbl_customer.middle_name","tbl_customer.contact_no","tbl_customer.email")
            ->join("tbl_customer", "tbl_customer.id", "=", "tbl_reservation.id")
            ->where("tbl_reservation.id", $res_id)
            ->first();
      
    }


    private function getOrder($id){
        $return_arr = array();
        $ordes = DB::table("tbl_order")
            ->where("reservation_id", $id)
            ->get();
        $totals = 0;
        
        foreach($ordes as $order){

            if($order->menu_id > 0){
               $data=  DB::table("tbl_food_menu")
                    ->where("id", $order->menu_id)
                    ->first();
                if($data == null){
                    $data=  DB::table("tbl_package_menu")
                    ->where("id", $order->menu_id)
                    ->first();


                }


            }else{
                $data = DB::table("tbl_add_ons")
                ->where("id", $order->add_on_id)
                ->first();
            }
                if($data == null){
                    continue;
                }
              

            $sub_total = $order->qty * $order->price;
            $totals += $sub_total;
            array_push($return_arr, array(
                "order_name" => $data->name,
                "inclusion" => $data->description,
                "qty" => $order->qty,
                "price" => $order->price,
                "sub_total" => number_format($sub_total,2),
            ));


        }
        array_push($return_arr, array(
            "order_name" => "",
            "inclusion" => "",
            "qty" => "",
            "price" => "TOTAL",
            "sub_total" =>number_format($totals,2),
        ));

        return $return_arr;
    }


}
