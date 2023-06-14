<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function employee(){
        return view('dashboard.employee.index');
    }
    public function employee_insert(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'tel' => 'required',
            'address' => 'required',
            'city' => 'required',
            'sex' => 'required',
            'religion' => 'required',
            'nid_no' => 'required|integer',
            'position' => 'required',
            'office_type' => 'required',
            'job_start_date' => 'required',
            'salery' => 'required|integer',
        ]);

        if($request->hasFile('picture')){
            $new_img =  $request->city."_".str::random(5).now()->format("h_m_d").".".$request->file('picture')->getClientOriginalExtension();
            $img = Image::make($request->file('picture'));
            $img->resize(800, 800, function ($constraint) {
                $constraint->aspectRatio();
            })->save(base_path('public/uploads/employe_photos/'.$new_img), 80, 'jpg');

            Employee::insert([
                'name' => $request->name,
                'email' => $request->email,
                'tel' => $request->tel,
                'address' => $request->address,
                'city' => $request->city,
                'sex' => $request->sex,
                'religion' => $request->religion,
                'nid_no' => $request->nid_no,
                'position' => $request->position,
                'office_type' => $request->office_type,
                'job_start_date' => $request->job_start_date,
                'salery' => $request->salery,
                'picture' => $new_img,
            ]);
        }else{
            Employee::insert([
                'name' => $request->name,
                'email' => $request->email,
                'tel' => $request->tel,
                'address' => $request->address,
                'city' => $request->city,
                'sex' => $request->sex,
                'religion' => $request->religion,
                'nid_no' => $request->nid_no,
                'position' => $request->position,
                'office_type' => $request->office_type,
                'job_start_date' => $request->job_start_date,
                'salery' => $request->salery,
            ]);
        }



        return redirect()->route('employee')->with('employee_add' , 'new employee details added');
    }
}
