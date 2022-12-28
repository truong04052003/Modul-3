<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function index()
    {
        $items  = Product::with('category')->paginate(4);
        if($key =request()->key){
            $items  = Product::with('category')->where('name','like','%'.$key.'%')->paginate(4);
        }
        return view('admin.products.index', compact('items'));
    }
    public function create()
    {
        $items = Category::all();
        return view('admin.products.create', compact('items'));
    }
    public function store(Request $request)
    {
        // // Validation 
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description'=>'required',
        ], [
            'name.required' => 'Không được để trống',
            'price.required' => 'Vui lòng nhập giá',
            'image.required' => 'Vui lòng chọn ảnh',
            'description.required' => 'Không được để trống'
        ]);
        if ($validator->fails()) {
            return redirect()->route('products.create')
                ->withErrors($validator)
                ->withInput();
        }
        // Luu
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

        try {
            $product->save(); //throw new Exection('Co loi xay ra');
        } catch (\Exception $e) {
            // Logic khi sai
            Log::error($e->getMessage());
            return redirect()->route('products.create')->with('error', 'Da co loi xay ra');
        }
        return redirect()->route('products.index');

        // $product->save();
        // return redirect()->route('products.index');
    }
    public function show($id)
    {
        $item = Product::find($id);
    }
    public function edit($id)
    {

        $product = Product::find($id);
        $items = Category::all();
        return view('admin.products.edit', compact('product','items'));
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
        $product->description = $request->description;
        $product->save();
        return redirect()->route('products.index');
    }
    //xóa 
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect()->route('products.index');
    }

    //thùng rác
    public function garbagecan()
    {
        $softs = Product::onlyTrashed()->get();
        return view('admin.products.soft', compact('softs'));
    }
    //khôi phục
    public function restore($id)
    {
        // dd($id);
        $softs = Product::withTrashed()->find($id);
        $softs->restore();
        return redirect()->route('products.index');
    }
    //xóa vĩnh viễn
    public function deleteforever($id)
    {
        $softs = Product::withTrashed()->find($id);
        $softs->forceDelete();
        return redirect()->route('products.garbagecan');
    }
    //tìm kiếm
    public function search(Request $request)
    {
        $products = Product::where('name', 'Like', '%' . $request->search . '%')
            ->orwhere('price', $request->search)
            ->get();
        return view('admin.product.search', compact('products'));
    }
}
