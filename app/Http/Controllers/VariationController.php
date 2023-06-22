<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    public function variation (Request $request)
    {
        $categories = category::all();
        return view('dashboard.variation.variation', compact('categories'));
    }
}
