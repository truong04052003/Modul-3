<?php

namespace App\Http\Controllers;

use App\Models\ProductCode;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;


class ProductCodeController extends Controller
{
    public function index()
    {
        $items = ProductCode::all();
        return view('admin.product_codes.index', compact('items'));
    }


    public function create()
    {
        $items = Product::all();
        return view('admin.product_codes.create', compact('items'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
        ], [
            'code.required' => 'Không được để trống',
        ]);
        if ($validator->fails()) {
            return redirect()->route('product_codes.create')
                ->withErrors($validator)
                ->withInput();
        }
        $productcode = new ProductCode();
        $productcode->code = $request->code;
        $productcode->product_id = $request->product_id;
       
        try {
            $productcode->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('product_codes.create')->with('error', 'Da co loi xay ra');
        }
        return redirect()->route('product_codes.index');




    }


    public function show($id)
    {
    }

    public function edit($id)
    {
        $productcode = ProductCode::find($id);
        $items = Product::all();
        return view('admin.product_codes.edit', compact('productcode','items'));
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
