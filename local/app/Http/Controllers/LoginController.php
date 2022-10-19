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
           
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }


}
