<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function category_insert (Request $request)
    {
        $request->validate([
            "*" => 'required',
        ]);
        if($request->link){
            $category_slug = Str::slug($request->category_slug);
        }else{
            $category_slug = Str::slug($request->category_name);
        }

        $new_img = auth()->user()->name."_".auth()->user()->id."_".str::random(5).now()->format("h_m_d").".".$request->file('category_image')->getClientOriginalExtension();
            $img = Image::make($request->file('category_image'));
            $img->resize(1200, 1800, function ($constraint) {
                $constraint->aspectRatio();
            })->save(base_path('public/uploads/category_photos/'.$new_img), 80, 'jpg');

        category::insert([
            'category_name' =>$request->category_name,
            'category_slug' =>$category_slug,
            'category_image' =>$new_img,
            'created_at' =>now()
        ]);
        return back()->with('category_insert' , 'Category submit successfully');
    }

    public function category_update(Request $request,$id){
        if($request->hasFile('category_image')){

            $old_image = category::find($id)->category_image;

                $file_destination = base_path('public/uploads/category_photos/'.$old_image);

                if(File::exists($file_destination)){
                    unlink(public_path('uploads/category_photos/'.$old_image));
                }

                $new_img =  $request->city."_".str::random(5).now()->format("h_m_d").".".$request->file('category_image')->getClientOriginalExtension();
                $img = Image::make($request->file('category_image'));
                $img->resize(360, 360, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(base_path('public/uploads/category_photos/'.$new_img), 80);

                category::findOrFail($id)->update([
                    'category_image' => $new_img,
                ]);
        }

        if($request->link){
            $category_slug = Str::slug($request->category_slug);
        }else{
            $category_slug = Str::slug($request->category_name);
        }

        category::findOrFail($id)->update([
            'category_name' =>$request->category_name,
            'category_slug' =>$category_slug,
            'created_at' =>now()
        ]);
        return redirect()->route('variation.view')->with('category_update' , $request->category_name.' details update successfully');
    }

    public function category_delete($id){
        category::find($id)->delete();
        return back()->with("category_delete", 'Category Delete sucessfully!');
    }
}
