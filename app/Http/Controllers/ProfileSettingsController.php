<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ProfileSettingsController extends Controller
{
    public function settings (Request $request)
    {
        return view('dashboard.settings.settings');
    }

    public function settings_update (Request $request, $id)
    {
        User::find($id)->update([
            'name' =>$request->name,
            'email' =>$request->email,
            'tel' =>$request->tel,
            'address' =>$request->address,
         ]);

         if($request->hasFile('image')){
            $new_img = auth()->user()->name."_".auth()->user()->id."_".str::random(5).now()->format("h_m_d").".".$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'));
            $img->resize(800, 800, function ($constraint) {
                $constraint->aspectRatio();
            })->save(base_path('public/uploads/profile_photos/'.$new_img), 80, 'jpg');

            User::find($id)->update([
                'picture' =>$new_img,
             ]);
         }
        return back()->with('sucessfully_update', "Your Profile Update Sucessfully!");
    }
}
