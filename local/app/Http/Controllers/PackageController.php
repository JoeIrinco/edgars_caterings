<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\DataTables;

class PackageController extends Controller

{
    public function index(){
        return view('admin_view.packageMenu');
    }

    public function genTable(){
        
        $customer = DB::table("tbl_package_menu")
            // ->select("tbl_customer.*")
            ->get();

        $customer = collect($customer);
      
        return Datatables::of($customer)
        ->addColumn('name', function($row) {
            return $row->name;
        })

        ->addColumn('description', function($row) {
            return $row->description;
        })
        ->addColumn('category', function($row) {
            return $row->category;
        })
        ->addColumn('price', function($row) {
            return "Php. ".number_format($row->price,2);

        })
        ->addColumn('image_path', function($row) {

            return $row->image_path;
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

            if($row->is_active == "1"){
                $btn = '<a class="btn btn-primary btn-xs" title="Update" data-toggle="modal" onclick="getOrderList('.$row->id.');" data-target="#order_modal"><i style="color:white;" class="fa fa-pencil" aria-hidden="true"></i></a> ';
                $btn .= '<a class="btn btn-warning btn-xs" onclick="approve('.$row->id.');" title="Set to Innactivate" data-target="#order_modal"><i style="color:white;" class="fa fa-ban" aria-hidden="true"></i></a> ';
            }elseif($row->is_active == "0"){
                $btn = '<a class="btn btn-primary btn-xs" title="Update" data-toggle="modal" onclick="getOrderList('.$row->id.');" data-target="#order_modal"><i style="color:white;" class="fa fa-pencil" aria-hidden="true"></i></a> ';
                $btn .= '<a class="btn btn-success btn-xs" onclick="approve('.$row->id.');" title="Set to Active" data-target="#order_modal"><i style="color:white;" class="fa fa-check" aria-hidden="true"></i></a> ';
            }


           

            return $btn;
        })

        
        
        ->make(true);

    }


}
