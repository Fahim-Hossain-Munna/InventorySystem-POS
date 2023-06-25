<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\category;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    public function variation (Request $request)
    {
        $categories = category::all();
        $brands = brand::all();
        return view('dashboard.variation.variation', compact('categories', 'brands'));
    }
}
