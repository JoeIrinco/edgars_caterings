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
        
        $addOn = DB::table("tbl_add_ons")
            ->orderBy('id', 'DESC')
            ->get();

        $addOn = collect($addOn);
      
        return Datatables::of($addOn)
        ->addColumn('name', function($row) {
            return $row->name;
        })

        ->addColumn('description', function($row) {
            return $row->description;
        })
        ->addColumn('price', function($row) {
            return "Php. ".number_format($row->price,2);
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
                $btn = '<a class="btn btn-primary btn-xs update_show" title="Update" data-id="'.$row->id.'"><i style="color:white;" class="fa fa-pencil" aria-hidden="true"></i></a> ';
                $btn .= '<a class="btn btn-warning btn-xs deactivate_menu" title="Set to Innactivate" data-id="'.$row->id.'"><i style="color:white;" class="fa fa-ban" aria-hidden="true"></i></a> ';
                $btn .= '<a class="btn btn-danger btn-xs delete_show" title="Delete" data-id="'.$row->id.'"><i style="color:white;" class="fa fa-trash" aria-hidden="true"></i></a> ';
            }elseif($row->is_active == "0"){
                $btn = '<a class="btn btn-primary btn-xs update_show" title="Update" data-id="'.$row->id.'"><i style="color:white;" class="fa fa-pencil" aria-hidden="true"></i></a> ';
                $btn .= '<a class="btn btn-success btn-xs activate_menu" title="Set to Active" data-id="'.$row->id.'"><i style="color:white;" class="fa fa-check" aria-hidden="true"></i></a> ';
                $btn .= '<a class="btn btn-danger btn-xs delete_show" title="Delete" data-id="'.$row->id.'"><i style="color:white;" class="fa fa-trash" aria-hidden="true"></i></a> ';
            }
            return $btn;
        })
       
        
        ->make(true);

    }


    public function add(Request $request){

        $current_date = date('Y-m-d H:i:s');

        DB::beginTransaction();
        try{

       DB::table("tbl_add_ons")
                ->insert([
                    'name' => $request->name,
                    'description' => $request->description,       
                    'price' => $request->price,
                    'is_active' => 1,
                    'date_added' => $current_date
                  
                ]);

        DB::commit();
        return 1;
            } catch (\Exception $e) {
            DB::rollback();
        }
         
        
    }

    public function update(Request $request){

        DB::beginTransaction();
        try{

            $current_date = date('Y-m-d H:i:s');

            DB::table("tbl_add_ons")
                     ->where('id',$request->id)
                     ->update([
                         'name' => $request->name,
                         'description' => $request->description,
                         'price' => $request->price,
                         'is_active' => 1,
                         'date_added' => $current_date
                     ]);

        DB::commit();
            } catch (\Exception $e) {
            DB::rollback();
        }
    }


    public function delete(Request $request){

        DB::beginTransaction();
        try{

            $current_date = date('Y-m-d H:i:s');

            DB::table("tbl_add_ons")
                     ->where('id',$request->id)
                     ->delete();

        DB::commit();
            } catch (\Exception $e) {
            DB::rollback();
        }
    }


    public function update_view(Request $request){

        $current_date = date('Y-m-d H:i:s');

      return $data =  DB::table("tbl_add_ons")
                     ->where('id',$request->id)
                     ->get();
    }


    public function activate(Request $request){

        $current_date = date('Y-m-d H:i:s');

      return $data =  DB::table("tbl_add_ons")
                     ->where('id',$request->id)
                     ->update([
                        'is_active' => 1
                    ]);
    }

    public function deactivate(Request $request){

        $current_date = date('Y-m-d H:i:s');

      return $data =  DB::table("tbl_add_ons")
                     ->where('id',$request->id)
                     ->update([
                        'is_active' => 0
                    ]);

                    
    }


}
