<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    //

    public function ajoutProduit(){
        return view('admin.ajoutProduit');
    }
    public function ProduitShowAll(){
        return view('admin.produitShowAll');
    }

       public function saveProduit(Request $request){

        return view('admin.ajoutProduit');
    }
}
