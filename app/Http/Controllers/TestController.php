<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function one(){
//        return "Hello Bitm";
        return view('home.bitm');
    }

    public function two(){
        $name = "Sakib Khan";
//        return view('home.pencil.pencilbox',compact('name'));
//        return view('home.pencil.pencilbox')->with([
//            'name' => $name
//        ]);
        return view('home.pencil.pencilbox',[
            'name' => $name
        ]);
    }

    public function myForm(Request $request){
        return $request->all();
    }
}
