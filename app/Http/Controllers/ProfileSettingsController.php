<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\File;


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
            'updated_at' => now(),
         ]);

         if($request->hasFile('image')){

            $old_image = User::find($id)->picture;
            $file_destination = base_path('public/uploads/profile_photos/'.$old_image);

                if(File::exists($file_destination)){
                    unlink(public_path('uploads/profile_photos/'.$old_image));
                }

            $new_img = auth()->user()->name."_".auth()->user()->id."_".str::random(5).now()->format("h_m_d").".".$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'));
            $img->resize(360, 360, function ($constraint) {
                $constraint->aspectRatio();
            })->save(base_path('public/uploads/profile_photos/'.$new_img), 80, 'jpg');

            User::find($id)->update([
                'picture' =>$new_img,
                'updated_at' => now(),
             ]);
         }
        return back()->with('sucessfully_update', "Your Profile Update Sucessfully!");
    }

    public function password_update (Request $request, $id)
    {
        $user = User::find($id);
        if (Hash::check($request->current_password, $user->password)) {
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);

            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

            return back()->with('password_update', "Your Password Update Sucessfully!");
        }else{
            return back()->with('wrong_pass', "Your Current password is Wrong");
        }


    }
}
