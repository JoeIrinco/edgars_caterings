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

            $btn = '<a class="btn btn-primary btn-xs update_show" title="Update" data-id="'.$row->id.'"><i style="color:white;" class="fa fa-pencil" aria-hidden="true"></i></a> ';
            
           
            return $btn;
        })
       
        
        ->make(true);

    }



    public function update(Request $request){

        DB::beginTransaction();
        try{

            $current_date = date('Y-m-d H:i:s');

            DB::table("tbl_customer")
                     ->where('id',$request->id)
                     ->update([
                         'last_name' => $request->last_name,
                         'first_name' => $request->first_name,
                         'middle_name' => $request->middle_name,
                         'contact_no' => $request->contact_no,
                         'email' => $request->email,
                         'date_added' => $current_date
                     ]);

        DB::commit();
            } catch (\Exception $e) {
            DB::rollback();
        }
    }


    public function update_view(Request $request){

      return $data =  DB::table("tbl_customer")
                     ->where('id',$request->id)
                     ->get();
    }


}
