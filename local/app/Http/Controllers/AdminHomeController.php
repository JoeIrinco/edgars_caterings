<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index(){
        return view('admin_view.home');
    }

    public function reservation(){
        return view('admin_view.reservation_list');
    }


}
