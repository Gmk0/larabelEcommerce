<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    //

        public function __construct()
    {
        $this->middleware('auth');
    }
    public function ajoutSlider(){
        return view('admin.ajouterSlider');
    }
     public function showAllSlider(){
         $slider= Slider::get();
        return view('admin.SliderShowAll')->with('slider',$slider);
    }

    public function edit_slider($id){
         $slider= Slider::find($id);
        return view('admin.editSlider')->with('slider',$slider);
    }

    public function saveSlider(Request $request){
        $this->Validate($request,['description_two'=>'required',
                                        'description_one'=>'required',
                                      'slider_image'=>'image|nullable|max:1999']);
        
        if($request->hasFile('slider_image')){
            //:1 get file name with ext
            $fileNameWithExt =$request->file('slider_image')->getClientOriginalName();
            //2 : get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            // 3 : get just file extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            //4 : get file name to store 
            $fileNameTostore=$fileName.'_'.time().'.'.$extension;
            
            //uploder l'image
            $path = $request ->file('slider_image')->storeAs('public/slider_images', $fileNameTostore);
        }
        else{
                $fileNameTostore ='noImage.jpg';

        }

        $slider = new slider();
        $slider ->description_one=$request->input('description_one');
        $slider ->description_two=$request->input('description_two');
        $slider ->slider_image=$fileNameTostore;
        $slider->status =1;
        $slider->save();
        return redirect('/showAllSlider')->with('status','le slider a ete bien ajoute');
    }

    public function updateSlider(Request $request){

        $slider= Slider::find($request->input('id'));

        $this->Validate($request,['description_two'=>'required',
                                  'description_one'=>'required',
                                  'slider_image'=>'image|nullable|max:1999']);

        $slider->description_two=$request->input('description_two');
        $slider->description_one=$request->input('description_one');

        if($request->hasFile('slider_image')){
            //:1 get file name with ext
            $fileNameWithExt =$request->file('slider_image')->getClientOriginalName();
            //2 : get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            // 3 : get just file extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            //4 : get file name to store 
            $fileNameTostore=$fileName.'_'.time().'.'.$extension;
            
            //uploder l'image
            $path = $request ->file('slider_image')->storeAs('public/slider_images', $fileNameTostore);
            if($slider ->slider_image != 'noimage.jpg')
            {
                \Storage::delete('public/slider_images/'.$slider->slider_image);
            }
              $slider->slider_image=$fileNameTostore;
        }
        
         $slider ->update();
         return redirect('/showAllSlider')->with('status','le produit a ete bien modifier');

    }


     public function delete_Slider($id){
         $slider= Slider::find($id);

          if($slider ->slider_image != 'noimage.jpg')
            {
                \Storage::delete('public/slider_images/'.$slider->slider_image);
            }
          $slider->delete();  

         return redirect('/ajoutSlider')->with('status','le slider a ete bien effacer');
    }

       public function activer_slider($id){
        $slider = slider::find($id);
        $slider->status=1;        
        $slider->update();
        return redirect('/showAllSlider');
    }
       public function desactiver_slider($id){
        $slider = slider::find($id);
        $slider->status=0;        
        $slider->update();
        return redirect('/showAllSlider');
    }



}
