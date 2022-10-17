<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
    public function index(){
        return view('frontEnd.login');
    }

    public function LogInAuthenticate(Request $request){
            dd("AUTHEN");
    }


}
