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
       
        
        ->make(true);

    }


}
