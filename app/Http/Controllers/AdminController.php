<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function dashboard(){
        return view('admin.dashboard');
    }
     public function commandes(){
         $orders= Order::get();
        return view('admin.command')->with('orders',$orders);
    }
}
