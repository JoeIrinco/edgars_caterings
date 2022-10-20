<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\DataTables;

class CustomerController extends Controller

{
    public function index(){
        return view('admin_view.customers');
    }

    public function genTable(){
        
        $customer = DB::table("tbl_customer")
            ->select("tbl_customer.*")
            ->get();

        $customer = collect($customer);
      
        return Datatables::of($customer)
        ->addColumn('customer_name', function($row) {
            return $row->first_name." ".$row->middle_name." ".$row->last_name;
        })

        ->addColumn('contact_no', function($row) {
            return $row->contact_no;
        })
        ->addColumn('email', function($row) {
            return $row->email;
        })
        ->addColumn('date_added', function($row) {

            return $row->date_added;
        })

        ->addColumn('action', function($row) {

            $btn = '<a class="btn btn-primary btn-xs" title="Update" data-toggle="modal" onclick="getOrderList('.$row->id.');" data-target="#order_modal"><i style="color:white;" class="fa fa-pencil" aria-hidden="true"></i></a> ';
            
           
            return $btn;
        })
       
        
        ->make(true);

    }


}
