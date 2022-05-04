<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function ajoutCategorie(){
        return view('admin.ajoutCategorie');
    }
    public function showAllCategorie(){
        return view('admin.categorie');
    }
    public function saveCategorie(Request $request){
        

    }
}
