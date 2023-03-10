<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::all();
        return response()->json($items,200);
    }
    public function show($id)
    {
        $items = Product::find($id);
        return response()->json($items,200);
    }
    public function store(Request $request)
    {
          // Luu
          $product = new Product();
          $product->TENSANPHAM = $request->name;
          $product->category_id = $request->category_id;
        $product->IMAGE = '267140396_601677187749576_4222963182025454727_n.jpg';
          
        try {
            $product->save();
            return response()->json($product, 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 200);
        }
    }
    public function update($id, Request $request)
    {
     
          $product = Product::find($id);
          $product->TENSANPHAM = $request->name;
        $product->category_id = $request->category_id;

          try {
            $product->save();
            return response()->json($request->all(), 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 200);
        }
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        try {
            $product->delete();
            return response()->json($product, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 200);
        }
    }
}
