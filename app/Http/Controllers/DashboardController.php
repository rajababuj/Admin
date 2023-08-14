<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use App\Models\Category;

class DashboardController extends Controller
{

    public function index()
    {
        $product=Product::all();
        $sizes = Size::all();
        $categorys = Category::all();
        return view('dashboard',compact('product', 'sizes', 'categorys'));
    }
}
