<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;


class sendEmailController extends Controller
{
    public function sendEmail($emailto,$nameto,$reservationid,$datetime,$totalprice,$status){
 
        $status_msg = "";
        if($status == "2"){
            $status_msg = "Reservation is available, Please Pay immediately";
        }elseif($status == "3"){
            $status_msg = "Payment Received by Edgar's Catering";
        }elseif($status == "4"){
            $status_msg = "Reservation is not available, Reservation is disapproved";
        }elseif($status == "5"){
            $status_msg = "All Deliverables is complete, PLease wait for the receipt";
        }elseif($status == "6"){
            $status_msg = "Receipt Sent";
        }elseif($status == "9"){
            $status_msg = "Booking Cancelled";
        }

       try {
        
        $data = array('name_to'=> $nameto, "status_msg" => $status_msg, 'reservationid' => $reservationid,'datetime'=>$datetime,'totalprice'=>'Php '.number_format($totalprice,2));
        //$data = "";
    	$email = "ilustrado.lourd@gmail.com";
      
            Mail::send('mail', $data, function($message) use ($email, $emailto, $nameto){
                $message->to($emailto, $nameto)->subject('EDGARDS CATERING');
                $message->from($email,'EDGARDS CATERING');
            });
       
            return "true";
       } catch (\Throwable $th) {
        return $th->getMessage();
       }
       

    }
}
