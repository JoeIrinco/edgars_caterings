<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GownController extends Controller
{
    public function index(){
        return view('frontEnd.gown');
    }
}
