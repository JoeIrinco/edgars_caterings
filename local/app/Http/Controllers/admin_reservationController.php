<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Yajra\Datatables\DataTables;

class admin_reservationController extends Controller
{

    public function approval_process(Request $request){
        
        if($request->status == "approve"){
            DB::table("tbl_reservation")
            ->where("id", $request->id)
            ->update(["status" => 2]);

            return  json_encode("Confirmed! \n waiting for the payment");

            //EMAIL HERE
        }elseif($request->status == "disapprove"){
            DB::table("tbl_reservation")
            ->where("id", $request->id)
            ->update(["status" => 4]);

            return  json_encode("Disapproved Booking Complete");
            //EMAIL HERE
        }elseif($request->status == "paid"){
            DB::table("tbl_reservation")
            ->where("id", $request->id)
            ->update(["status" => 3]);

            return  json_encode("Payment Received");
            //EMAIL HERE
        }
        elseif($request->status == "done"){
            DB::table("tbl_reservation")
            ->where("id", $request->id)
            ->update(["status" =>5]);

            return  json_encode("Deliverables Completed");
            //EMAIL HERE
        }
        elseif($request->status == "cancel"){
            DB::table("tbl_reservation")
            ->where("id", $request->id)
            ->update(["status" =>9]);

            return  json_encode("Booking Cancelled");
            //EMAIL HERE
        }
        elseif($request->status == "receipt"){
            DB::table("tbl_reservation")
            ->where("id", $request->id)
            ->update(["status" =>6]);

            return  json_encode("Receipt Sent");
            //EMAIL HERE
        }
        elseif($request->status == "resend_receipt"){
          
            return  json_encode("Receipt resent");
            //EMAIL HERE
        }else{
            return json_encode("FUNCTION UNDEFINED");
        }
        
        
      
    }

        public function genTable(){
            

            $reservation = DB::table("tbl_reservation")
                ->select("first_name", "middle_name", "last_name", "tbl_reservation.*")
                ->join("tbl_customer", "tbl_customer.id", "=", "tbl_reservation.customer_id")
                ->where("status", "!=", 0)
                ->get();


            $reservation = collect($reservation);
          
            return Datatables::of($reservation)
            ->addColumn('customer_name', function($row) {
                return $row->first_name." ".$row->middle_name." ".$row->last_name;
            })
            ->addColumn('datetime', function($row) {
                return $row->date_reserved." ".$row->time_reserved;
            })
            ->addColumn('location', function($row) {
                return $row->location_type;
            })
            ->addColumn('no_packs', function($row) {
                return $row->no_of_packs;
            })
            ->addColumn('message', function($row) {
                return $row->message;
            })
            ->addColumn('total_price', function($row) {
                return "Php. ".number_format($row->total_price,2);
            })
            ->addColumn('status', function($row) {
                if($row->status == "1"){
                    return "For Confirmation";
                }elseif($row->status == "2"){
                    return "Waiting for Payment";
                }elseif($row->status == "3"){
                    return "Paid/Reservation confirmed";
                }elseif($row->status == "4"){
                    return "Disapproved Reservation";
                }elseif($row->status == "5"){
                    return "Deliverables Completed";
                }elseif($row->status == "6"){
                    return "Receipt Sent";
                }elseif($row->status == "9"){
                    return "Booking Cancelled";
                }
                
                else{
                    return "Unknown Status";
                }


            })
            ->addColumn('action', function($row) {
                $btn = '<a class="btn btn-primary" title="Show Order List" data-toggle="modal" onclick="getOrderList('.$row->id.');" data-target="#order_modal"><i style="color:white;" class="fa fa-folder-open-o" aria-hidden="true"></i></a> ';
                if($row->status == "1"){
       

                $btn .= '<a class="btn btn-success" onclick="approve('.$row->id.');" title="confirm reservation" data-target="#order_modal"><i style="color:white;" class="fa fa-check-circle-o" aria-hidden="true"></i></a> ';

                $btn .= '<a class="btn btn-danger" onclick="disapprove('.$row->id.');" title="disapprove reservation" data-target="#order_modal"><i style="color:white;" class="fa fa-window-close" aria-hidden="true"></i></a> ';
                }elseif($row->status == "2"){
                    $btn .= '<a class="btn btn-success" onclick="paid('.$row->id.');" title="Payment Received" data-target="#order_modal"><i style="color:white;" class="fa fa-usd" aria-hidden="true"></i></a> ';

                $btn .= '<a class="btn btn-danger" onclick="disapprove('.$row->id.');" title="disapprove reservation" data-target="#order_modal"><i style="color:white;" class="fa fa-window-close" aria-hidden="true"></i></a> ';
                }
                elseif($row->status == "3"){
                    $btn .= '<a class="btn btn-success" onclick="done('.$row->id.');" title="Delivered" data-target="#order_modal"><i style="color:white;" class="fa fa-flag-checkered" aria-hidden="true"></i></a> ';

                $btn .= '<a class="btn btn-danger" onclick="cancel('.$row->id.');" title="Cancel Booking" data-target="#order_modal"><i style="color:white;" class="fa fa-reply-all" aria-hidden="true"></i></a> ';
                }
                elseif($row->status == "4"){
                    $btn .= '<a class="btn btn-success" onclick="paid('.$row->id.');" title="Payment Received" data-target="#order_modal"><i style="color:white;" class="fa fa-usd" aria-hidden="true"></i></a> ';

                }
                elseif($row->status == "5"){
                    $btn .= '<a class="btn btn-success" onclick="receipt('.$row->id.');" title="Send Receipt" data-target="#order_modal"><i style="color:white;" class="fa fa-paper-plane" aria-hidden="true"></i></a> ';

                    $btn .= '<a class="btn btn-danger" onclick="cancel('.$row->id.');" title="Cancel Booking" data-target="#order_modal"><i style="color:white;" class="fa fa-reply-all" aria-hidden="true"></i></a> ';

                }
                elseif($row->status == "6"){
                    $btn .= '<a class="btn btn-success" onclick="resend_receipt('.$row->id.');" title="Resend Receipt" data-target="#order_modal"><i style="color:white;" class="fa fa-share"" aria-hidden="true"></i></a> ';

                }
                


                return $btn;
            })
            
            ->make(true);




        }

        public function getOrderList(Request $request){
            $return_arr = array();
            $ordes = DB::table("tbl_order")
                ->where("reservation_id", $request->id)
                ->get();
            $totals = 0;
            foreach($ordes as $order){

                if($order->menu_id > 0){
                   $data=  DB::table("tbl_package_menu")
                        ->where("id", $order->menu_id)
                        ->first();
                }else{
                    $data = DB::table("tbl_add_ons")
                    ->where("id", $order->add_on_id)
                    ->first();
                }
                
                $sub_total = $order->qty * $order->price;
                $totals += $sub_total;
                array_push($return_arr, array(
                    "order_name" => $data->name,
                    "qty" => $order->qty,
                    "price" => $order->price,
                    "sub_total" => number_format($sub_total,2),
                ));


            }
            array_push($return_arr, array(
                "order_name" => "",
                "qty" => "",
                "price" => "TOTAL",
                "sub_total" =>number_format($totals,2),
            ));



                $return_arr = collect($return_arr);

                return Datatables::of($return_arr)->make(true);



          

            

        }


}
