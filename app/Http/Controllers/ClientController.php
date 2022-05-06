<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //

    public function home(){
        return view('Client.home');
    }

    public function cart(){
        return view('Client.cart');
    }

    public function shop(){
        return view('Client.show');
    }

    public function checkout(){
        return view('Client.checkout');
    }

    public function client_login(){
        return view('Client.login');
    }
     public function signup(){
        return view('Client.signup');
    }
}
