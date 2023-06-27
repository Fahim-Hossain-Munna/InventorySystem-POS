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
        $request->validate([
            "*" => 'required',
        ]);

        $new_img = auth()->user()->name."supplier_".auth()->user()->id."_".str::random(5).now()->format("h_m_d").".".$request->file('image')->getClientOriginalExtension();
        $img = Image::make($request->file('image'));
        $img->resize(1200, 1800, function ($constraint) {
                $constraint->aspectRatio();
        })->save(base_path('public/uploads/supplier_photos/'.$new_img), 80, 'jpg');

        supplier::insert([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'supplier_brand_id' => $request->supplier_brand_id,
            'supplier_type' => $request->supplier_type,
            'mobile_banking' => $request->mobile_banking,
            'Mobile_banking_Account_number' => $request->Mobile_banking_Account_number,
            'account_holder_name' => $request->account_holder_name,
            'bank_name' => $request->bank_name,
            'branch_name' => $request->branch_name,
            'bank_account_number' => $request->bank_account_number,
            'current_address' => $request->current_address,
            'parmanent_address' => $request->parmanent_address,
            'image' => $new_img,
            'created_at' => now(),
        ]);
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
    public function update(Request $request, supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(supplier $supplier)
    {
        //
    }
}
