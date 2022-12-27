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

    public function index(Request $request)
    {

        $products = Product::all();
        $search = $request->input('product');
        if ($search) {
            $products = Product::where('name', 'LIKE', '%' . $search . '%')->get();
        }
        else{
            $products = Product::get();
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
                "quantity" => 1,
                'image' => $product->image,
            ];
        }
        session()->put('cart', $cart);
        $data = [];
        $data['cart'] = session()->has('cart');
        return redirect()->route('cart-index');
    }
    public function cart()
    {
        $products = Product::all();
        $categories = Category::all();
        $param = [
            'products' => $products,
            'categories' => $categories,
        ];
        return view('shop.includes.cart', $param);
    }
    public function show($id)
    {
        $product =Product::find($id);
        return view('shop.includes.show',compact('product'));
    }
    public function update($id)
    {
        
    }
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
    }

    public function checkOuts()
    {
        return view('shop.includes.checkout');
    }
 
}
