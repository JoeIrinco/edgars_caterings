<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CateringController extends Controller
{
    public function index(){
        return view('frontEnd.catering');
    }

    public function wedding(){
        return view('frontEnd.wedding');
    }

    public function kids(){
        return view('frontEnd.kids');
    }

    public function christening(){
        return view('frontEnd.christening');
    }

    public function corporate(){
        return view('frontEnd.corporate');
    }

    public function debut(){
        return view('frontEnd.debut');
    }


}
