<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\DataTables;

class EventsAddController extends Controller

{
    public function index(){
        return view('admin_view.eventsAddOns');
    }

    public function genTable(){
        
        $customer = DB::table("tbl_add_ons")
            ->select("tbl_add_ons.*")
            ->get();

        $customer = collect($customer);
      
        return Datatables::of($customer)
        ->addColumn('name', function($row) {
            return $row->name;
        })

        ->addColumn('description', function($row) {
            return $row->description;
        })
        ->addColumn('price', function($row) {
            return $row->price;
        })
        ->addColumn('is_active', function($row) {

            if($row->is_active == "1"){
                return "Active";
            }elseif($row->is_active == "0"){
                return "Innactive";
            }

            
        })

        ->addColumn('date_added', function($row) {

            return $row->date_added;
        })

        ->addColumn('action', function($row) {
            $btn = '<a class="btn btn-primary btn-xs" title="Show Order List" data-toggle="modal" onclick="getOrderList('.$row->id.');" data-target="#order_modal"><i style="color:white;" class="fa fa-pencil" aria-hidden="true"></i></a> ';
            $btn .= '<a class="btn btn-warning btn-xs" onclick="approve('.$row->id.');" title="confirm reservation" data-target="#order_modal"><i style="color:white;" class="fa fa-ban" aria-hidden="true"></i></a> ';

            return $btn;
        })
       
        
        ->make(true);

    }


}
