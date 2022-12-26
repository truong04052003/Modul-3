<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ShopController extends Controller
{

    public function index()
    {
        $products = Product::all();
        if($key = request()->key){
            $products = Product::all()->where('name','like','%'.$key.'%');
        }
        return view('shop.layouts.main', compact('products'));
        
    }
    public function store($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => $product->quantity,
                "category_id"=> $product->category_id,
                'image' => $product->image,
            ];
        }
        session()->put('cart', $cart);
        $data = [];
        $data['cart'] = session()->has('cart');
        return redirect()->route('shop.cart');
      
    }
    public function cart()
    {
        $products = Product::all();
        $categories = Category::all();
        $param = [
            'products' => $products,
            'categories' => $categories,
        ];
        return view('shop.includes.cart',$param);
    }
    public function show($id)
    {
      
        return view('shop.includes.show');
    }
    public function update($id)
    {
      
    }
    public function remove($id)
    {
        // if ($request->id) {
        //     $cart = session()->get('cart');
        //     if (isset($cart[$request->id])) {
        //         unset($cart[$request->id]);
        //         session()->put('cart', $cart);
        //     }
        //     session()->put('cart', $cart);
        //     return response()->json(['status' => 'Xóa đơn hàng thành công']);
        // }
    }

    public function checkOuts($id)
    {
        return view('shop.checkout');
    }
    public function order(Request $request)
    {


    }
    
}
