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
   //view giỏ hàng
   public function cart()
   {
       return view('shop.includes.cart');
   }
   //thêm vào giỏ hàng
   public function addToCart($id)
   {
       $product = Product::find($id);
       if (!$product) {
           abort(404);
       }
       $cart = session()->get('cart');
       if (!$cart) {
           $cart = [
               $id => [
                   "name" => $product->name,
                   "quantity" => 1,
                   "price" => $product->price,
                   "image" => $product->image
               ]
           ];
           session()->put('cart', $cart);
           return redirect()->back();
       }
       if (isset($cart[$id])) {
           $cart[$id]['quantity']++;
           session()->put('cart', $cart);
           return redirect()->back();
       }
       $cart[$id] = [
           "name" => $product->name,
           "quantity" => 1,
           "price" => $product->price,
           "image" => $product->image
       ];
       session()->put('cart', $cart);
       return redirect()->back();
   }
   //cập nhật giỏ hàng
   public function update1(Request $request)
   {
       if ($request->id and $request->quantity) {
           $cart = session()->get('cart');
           $cart[$request->id]["quantity"] = $request->quantity;
           session()->put('cart', $cart);
       }
   }
   //xóa giỏ hàng
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
    public function show($id)
    {
        // dd(1);
        $product =Product::find($id);
        return view('shop.includes.show',compact('product'));
    }
    public function checkOuts()
    {
        return view('shop.includes.checkout');
    }
 
}
