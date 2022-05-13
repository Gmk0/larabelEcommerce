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
         $orders->transform(function($order, $key){
             $order->panier = unserialize($order->panier);
             return $order;
        });
        
        

         return view('admin.command')->with('orders',$orders);
         
    }
}
