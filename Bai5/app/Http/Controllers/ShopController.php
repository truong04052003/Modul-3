<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
 
    public function index()
    {
        $products = Product::all();
        // dd($Products);
        return view('shop.layouts.main', compact('products'));
    }
    public function cart($id)
    {
        $products = Product::find($id);
        return view('shop.includes.cart', compact('products'));
    }
   

}
