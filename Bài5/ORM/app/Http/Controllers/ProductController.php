<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Category;


class ProductController extends Controller
{
    

    public function index()
    {
          $items = Product::all();
        // $items = DB::table('products')->get();
        // select * from products
        // dd($items);
        return view('admin.products.index' , compact('items'));

    }


    public function create()
    {
        return view('products.create');
    }
    

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id  = $request->category_id ;
        $product->created_at = $request->created_at;
        $product->updated_at = $request->updated_at;
        $product->save();

        return redirect()->route('products.index');
    }

  
    public function show($id)
    {
        $item = Product::find($id);
        // $item = DB::table('products')->where('id','=',$id)->first();
        //select * from products where id = 1
        dd($item);
        //http://127.0.0.1:8000/products/1
    }

  
    public function edit($id)
    {
        $item = Product::find($id);
        dd($item);
        
    }
    public function update(Request $request, $id)
    {
        $item = Product::find($id);
        // $item = DB::table('products')->where('id','=',$id)->first();
        //select * from products where id = 1
        dd($item);
        //http://127.0.0.1:8000/products/1
    }

  
    public function destroy($id)
    {
        //
    }
}
