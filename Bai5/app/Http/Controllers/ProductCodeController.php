<?php

namespace App\Http\Controllers;

use App\Models\ProductCode;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductCodeController extends Controller
{
    public function index()
    {
        $items = ProductCode::all();
        return view('admin.product_codes.index', compact('items'));
    }


    public function create()
    {
        return view('admin.product_codes.create');
    }


    public function store(Request $request)
    {
        $productcode = new ProductCode();
        $productcode->code = $request->code;
        $productcode->product_id = $request->product_id;
        $productcode->save();

        return redirect()->route('product_codes.index');
    }


    public function show($id)
    {
    }

    public function edit($id)
    {
        $productcode = ProductCode::find($id);
        // dd($product);
        return view('admin.product_codes.edit', compact('productcode'));
    }


    public function update(Request $request, $id)
    {
        $productcode = ProductCode::find($id);
        $productcode->code = $request->code;
        $productcode->product_id = $request->product_id;
        $productcode->save();
        return redirect()->route('product_codes.index');
    }


    public function destroy($id)
    {
        ProductCode::find($id)->delete();
        return redirect()->route('product_codes.index');
    }
    public function softdeletes()
    {
    }
    public function trash()
    {

    }
    public function restoredelete()
    {
        
    }
}
