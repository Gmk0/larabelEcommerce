<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;

class ProduitController extends Controller
{
    //

    public function ajoutProduit(){
         $categorie = Category::All()->pluck('category_name','category_name');
        return view('admin.ajoutProduit')->with('categorie',$categorie);

    }
    public function ProduitShowAll(){

        $Product = Product::get();
        return view('admin.produitShowAll')->with('Product',$Product);
    }

       public function saveProduit(Request $request){
           $this->Validate($request,['product_category'=>'required',
                                        'product_name'=>'required|unique:products',
                                      'product_image'=>'image|nullable|max:1999'                              ]);
        
        if($request->hasFile('product_image')){
            //:1 get file name with ext
            $fileNameWithExt =$request->file('product_image')->getClientOriginalName();
            //2 : get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            // 3 : get just file extension
            $extension = $request->file('product_image')->getClientOriginalExtension();
            //4 : get file name to store 
            $fileNameTostore=$fileName.'_'.time().'.'.$extension;
            
            //uploder l'image
            $path = $request ->file('product_image')->storeAs('public/product_images', $fileNameTostore);
        }
        else{
                $fileNameTostore ='noImage.jpg';

        }

        $product = new Product();
        $product ->product_name=$request->input('product_name');
        $product ->product_price=$request->input('product_price');
        $product ->product_category=$request->input('product_category');
        $product ->product_image=$fileNameTostore;
        $product->status =1;
        $product->save();
        return redirect('/ajoutProduit')->with('status','le produit a ete bien ajouter ');
        
    }


        public function edit_produit($id){

        $Product = Product::find($id);
        $categorie = Category::All()->pluck('category_name','category_name');
        return view('admin.editProduit')->with('Product',$Product)->with('categorie',$categorie);

    }

    public function updateProduit(Request $request){
         $product = Product::find($request->input('id'));
          $this->Validate($request,['product_category'=>'required',
                                        'product_name'=>'required',
                                      'product_image'=>'image|nullable|max:1999']);
        
        $product ->product_name=$request->input('product_name');
        $product ->product_price=$request->input('product_price');
        $product ->product_category=$request->input('product_category');
        
        if($request->hasFile('product_image')){
            //:1 get file name with ext
            $fileNameWithExt =$request->file('product_image')->getClientOriginalName();
            //2 : get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            // 3 : get just file extension
            $extension = $request->file('product_image')->getClientOriginalExtension();
            //4 : get file name to store 
            $fileNameTostore=$fileName.'_'.time().'.'.$extension;
            
            //uploder l'image
            $path = $request ->file('product_image')->storeAs('public/product_images', $fileNameTostore);
            if($product ->product_image != 'noimage.jpg')
            {
                \Storage::delete('public/product_images/'.$product->product_image);
            }
              $product->product_image=$fileNameTostore;
        }
        
         $product ->update();
         return redirect('/produitShowAll')->with('status','le produit a ete bien modifier');

    }
}
