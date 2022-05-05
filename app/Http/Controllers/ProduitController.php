<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
