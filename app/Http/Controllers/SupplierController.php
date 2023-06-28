<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\Employee;
use App\Models\supplier;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        $suppliers = supplier::all();
        $brands = brand::all();
        return view('dashboard.supplier.index',compact('employees', 'brands', 'suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $new_img = auth()->user()->name."supplier_".auth()->user()->id."_".str::random(5).now()->format("h_m_d").".".$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'));
            $img->resize(1200, 1800, function ($constraint) {
                    $constraint->aspectRatio();
            })->save(base_path('public/uploads/supplier_photos/'.$new_img), 80, 'jpg');
            supplier::insert([
                'name' => $request->name,
                'email' => $request->email,
                'tel' => $request->tel,
                'supplier_brand_name' => $request->supplier_brand_name,
                'supplier_type' => $request->supplier_type,
                'mobile_banking' => $request->mobile_banking,
                'Mobile_banking_Account_number' => $request->Mobile_banking_Account_number,
                'account_holder_name' => $request->account_holder_name,
                'bank_name' => $request->bank_name,
                'branch_name' => $request->branch_name,
                'bank_account_number' => $request->bank_account_number,
                'current_address' => $request->current_address,
                'parmanent_address' => $request->parmanent_address,
                'created_at' => now(),
                'image' => $new_img,
            ]);
        }else{
            supplier::insert([
                'name' => $request->name,
                'email' => $request->email,
                'tel' => $request->tel,
                'supplier_brand_name' => $request->supplier_brand_name,
                'supplier_type' => $request->supplier_type,
                'mobile_banking' => $request->mobile_banking,
                'Mobile_banking_Account_number' => $request->Mobile_banking_Account_number,
                'account_holder_name' => $request->account_holder_name,
                'bank_name' => $request->bank_name,
                'branch_name' => $request->branch_name,
                'bank_account_number' => $request->bank_account_number,
                'current_address' => $request->current_address,
                'parmanent_address' => $request->parmanent_address,
                'created_at' => now(),
            ]);
        }
        return back()->with('supplier_insert' , 'Supplier Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        supplier::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'supplier_brand_name' => $request->supplier_brand_name,
            'supplier_type' => $request->supplier_type,
            'mobile_banking' => $request->mobile_banking,
            'Mobile_banking_Account_number' => $request->Mobile_banking_Account_number,
            'account_holder_name' => $request->account_holder_name,
            'bank_name' => $request->bank_name,
            'branch_name' => $request->branch_name,
            'bank_account_number' => $request->bank_account_number,
            'current_address' => $request->current_address,
            'parmanent_address' => $request->parmanent_address,
            'created_at' => now(),
         ]);

         if($request->hasFile('image')){
            $old_image = supplier::find($id)->image;
            $file_destination = base_path('public/uploads/supplier_photos/'.$old_image);
            if(File::exists($file_destination)){
                unlink(public_path('uploads/supplier_photos/'.$old_image));
            }

            $new_img = auth()->user()->name."supplier_".auth()->user()->id."_".str::random(5).now()->format("h_m_d").".".$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'));
            $img->resize(360, 360, function ($constraint) {
                $constraint->aspectRatio();
            })->save(base_path('public/uploads/supplier_photos/'.$new_img), 80, 'jpg');

            supplier::find($id)->update([
                'image' =>$new_img,
                'updated_at' => now(),
             ]);
         }
        return back()->with('supplier_update', "Your Supplier Update Sucessfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        supplier::find($id)->delete();
        return back();
    }
}
