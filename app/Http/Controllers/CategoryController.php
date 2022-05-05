<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    //

    public function ajoutCategorie(){
        return view('admin.ajoutCategorie');
    }
    public function showAllCategorie(){
        $categorie = Category::get();
        return view('admin.categorie')->with('categorie',$categorie);
    }
    
     public function editCategory($id){
        $categorie = Category::find($id);

        return view('admin.editCategory')->with('categorie',$categorie);
    }

      public function deleteCategory($id){
        $categorie = Category::find($id);
        $categorie->delete();
        return redirect('/showAllCategorie')->with('status','La categorie a ete bien effacer');
    }
   


    public function saveCategorie(Request $request){
        $categorie = new Category();
        $this->Validate($request,['category_name'=>'required|unique:categories']);
        $categorie->category_name = $request->input('category_name');
        $categorie->save();
        return redirect('/ajoutCategorie')->with('status','La categorie a ete bien ajouter');
    }

    public function updateCategory(Request $request){
        $categorie =Category::find($request->input('id'));
        $this->Validate($request,['category_name'=>'required|unique:categories']);
        $categorie->category_name = $request->input('category_name');
        $categorie->update();
        return redirect('/showAllCategorie')->with('status','La categorie a ete bien modifier');
    }


}
