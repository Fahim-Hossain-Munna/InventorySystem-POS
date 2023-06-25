<?php

namespace App\Http\Controllers;
use App\Models\brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function brand_insert(Request $request){
        $request->validate([
            "*" => 'required',
        ]);
        if($request->link){
            $brand_slug = Str::slug($request->brand_slug);
        }else{
            $brand_slug = Str::slug($request->brand_name);
        }

        $new_img = auth()->user()->name."_".auth()->user()->id."_".str::random(5).now()->format("h_m_d").".".$request->file('brand_image')->getClientOriginalExtension();
            $img = Image::make($request->file('brand_image'));
            $img->resize(1200, 1800, function ($constraint) {
                $constraint->aspectRatio();
            })->save(base_path('public/uploads/brand_photos/'.$new_img), 80, 'jpg');

        brand::insert([
            'brand_name' =>$request->brand_name,
            'brand_slug' =>$brand_slug,
            'brand_image' =>$new_img,
            'created_at' =>now()
        ]);
        return back()->with('brand_insert' , 'Brand Added successfully');
    }

    public function brand_update(Request $request,$id){
        if($request->hasFile('brand_image')){

            $old_image = brand::find($id)->brand_image;

                $file_destination = base_path('public/uploads/category_photos/'.$old_image);

                if(File::exists($file_destination)){
                    unlink(public_path('uploads/category_photos/'.$old_image));
                }

                $new_img =  $request->city."_".str::random(5).now()->format("h_m_d").".".$request->file('brand_image')->getClientOriginalExtension();
                $img = Image::make($request->file('brand_image'));
                $img->resize(360, 360, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(base_path('public/uploads/brand_photos/'.$new_img), 80);

                brand::findOrFail($id)->update([
                    'brand_image' => $new_img,
                ]);
        }

        if($request->link){
            $brand_slug = Str::slug($request->brand_slug);
        }else{
            $brand_slug = Str::slug($request->brand_slug);
        }

        brand::findOrFail($id)->update([
            'brand_name' =>$request->brand_name,
            'brand_slug' =>$brand_slug,
            'created_at' =>now()
        ]);
        return redirect()->route('variation.view')->with('brand_update' , $request->brand_name.' details update successfully');
    }

    public function brand_delete($id){
        brand::find($id)->delete();
        return back()->with("brand_delete", 'Brand Delete sucessfully!');
    }
}
