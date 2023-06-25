<?php

namespace App\Http\Controllers;
use App\Models\brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

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

    // public function brand_details($id){
    //     $brands = brand::find($id);
    //     return view('dashboard.variation.category.category_details', compact('brands'));
    // }

    public function brand_delete($id){
        brand::find($id)->delete();
        return back()->with("brand_delete", 'Brand Delete sucessfully!');
    }
}
