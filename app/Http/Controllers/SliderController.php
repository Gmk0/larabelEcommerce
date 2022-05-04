<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    //
    public function ajoutSlider(){
        return view('admin.ajouterSlider');
    }
     public function showAllSlider(){
        return view('admin.SliderShowAll');
    }
    public function saveSlider(Request $request){

    }
}
