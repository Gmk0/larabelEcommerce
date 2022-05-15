<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Cart;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Stripe\Charge;
use Stripe\Stripe;

class ClientController extends Controller
{
    //

    public function home(){
        $sliders = Slider::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        return view('Client.home')->with('products',$products)->with('sliders',$sliders);
    }

    public function cart(){
        if(!Session::has('cart')){
            return view('Client.cart');
        };
        
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('Client.cart',['products'=>$cart->items]);
        
    }
      public function checkout(){
          if(!Session::has('client')){
            return view('Client.login');
        }else{
                 return view('Client.checkout');
        };
       
    }

    public function shop(){
         $category = Category::get();
        $products = Product::where('status', 1)->Paginate(10);
        return view('Client.show')->with('products',$products)->with('category',$category);
    
    }

      public function payement(Request $request){
          if(!Session::has('cart')){
              return view('Client.show');
          }
          $oldCart = Session::has('cart') ? Session::get('cart'):null;
          $cart= new Cart ($oldCart);
       Stripe::setApiKey('sk_test_51KxdgQB5uPnFOAdoXl8Ew4LFU9Y0fkMlYFWhLj63JDkOKDaqzlK3TBo9cWD3XpFc9RMQAAa1f3yer3JOLDI4khWk00gu8VFsV4');

        try{

            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                "description" => "Test Charge"
            ));
            $order = New Order();
            
            $order->nom=$request->input('card-name');
            $order->adresse=$request->input('adresse');
            $order->panier=serialize($cart);
            $order->payement_id=$charge->id;
            $order->save();

          

        } catch(\Exception $e){
           Session::put('error',$e->getMessage());
            return redirect('/checkout');
        }

        Session::forget('cart');
      // Session::put('success', 'Purchase accomplished successfully !');
        return redirect('/cart')->with('status','Purchase accomplished successfully !');
    }














    
        public function sele_cat($id){
         $category = Category::get();
        $products = Product::where('product_category',$id)->where('status', 1)->Paginate(10);
        return view('Client.show')->with('products',$products)->with('category',$category);
    
    }

    
    public function add_cart($id){
        $products = Product::find($id);
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($products,$id);
        Session::put('cart',$cart);
        return redirect('/shop');
        
    }

     public function update_qty(Request $request, $id){

        
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($id ,$request->quantity );
        Session::put('cart',$cart);
        return Redirect::to('/cart');
        
    }

        public function remove_item($id){        
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
            if(count($cart->items) > 0){
                Session::put('cart',$cart);
            }
            else{
                Session::forget('cart');
            }

        return Redirect::to('/cart');
        
    }



  

    public function client_login(){
        return view('Client.login');
    }
     public function signup(){
        return view('Client.signup');
    }


    public function createCompte(Request $request){

        $this->Validate($request,['name'=>'required|unique:clients',
                                    'email'=>'email|required|unique:clients',
                                    'password'=>'required|min:4']);
        $client = new Client();
        $client->name=$request->input('name');
        $client->password =bcrypt($request->input('password'));
        $client->email =$request->input('email');
        $client->save();
        return back()->with('status','Votre compte a été créé avec succes');
    }

    
    public function accederCompte(Request $request){

        $this->Validate($request,['name'=>'required',
                                    'password'=>'required']);

        $client = Client::where('name',$request->input('name'))->first();

        if ($client) {

            if (Hash::check($request->input('password'), $client->password)) {
                Session::put('client',$client);
                return redirect('/shop');
            } else 
            {
                # code...
                return back()->with('status','mot de passe incorrect');
            }
            
            
        } else {
            # code...
              return back()->with('status',"ce nom d'utilisateur n'existe pas");
        }
        
        return back()->with('status','Votre compte a été créé avec succes');
    }

    public function logout(){
        Session::forget('client');
        return back();
    }   
    
}
