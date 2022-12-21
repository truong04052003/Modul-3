<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Http\Requests\StoreUpdatePost;
use Illuminate\Database\Query\Builder;


class ProductController extends Controller
{
    public function index()
    {
        $items  = Product::with('category')->paginate(4);
        return view('admin.products.index', compact('items'));
    }
    public function create()
    {
        $items = Category::all();
        return view('admin.products.create', compact('items'));
    }
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'admin/uploads/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image = $new_image;
            $data['product_image'] = $new_image;
        }
        $product->save();
        return redirect()->route('products.index');
    }
    public function show($id)
    {
        $item = Product::find($id);
        dd($item);
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'admin/uploads/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image = $new_image;
            $data['product_image'] = $new_image;
        }
        $product->save();
        return redirect()->route('products.index');
    }
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products.index');
    }
    //tìm kiếm
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('products.index');
        }
        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        return view('products.list', compact('products', 'cities'));
    }
}
