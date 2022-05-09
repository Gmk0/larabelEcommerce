<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;

class ClientController extends Controller
{
    //

    public function home(){
        $sliders = Slider::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        return view('Client.home')->with('products',$products)->with('sliders',$sliders);
    }

    public function cart(){
        return view('Client.cart');
    }

    public function shop(){
         $category = Category::get();
        $products = Product::where('status', 1)->Paginate(10);
        return view('Client.show')->with('products',$products)->with('category',$category);
    
    }

    
        public function sele_cat($id){
         $category = Category::get();
        $products = Product::where('product_category',$id)->where('status', 1)->Paginate(10);
        return view('Client.show')->with('products',$products)->with('category',$category);
    
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
