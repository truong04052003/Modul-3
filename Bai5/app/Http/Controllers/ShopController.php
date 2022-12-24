<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
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
        // dd($Products);
        return view('shop.layouts.main', compact('products'));
    }
    public function store( $id)
    {

        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['amount']++;
   

        } else {
            $cart[$id] = [
                "nameVi" => $product->name,
                "amount" => 1,
                "price" => $product->price,
                'image' => $product->image,
                'max' => $product->amount,
            ];
        }

        session()->put('cart', $cart);
        $data = [];
        $data['cart'] = session()->has('cart');
        return redirect()->route('shop');
    }
    public function cart()
    {
        $productshow = Product::all();
        $categories = Category::all();
        $param = [
            'productshow' => $productshow,
            'categories' => $categories,
        ];
        return view('shop.includes.cart', $param);
    }
    public function show($id)
    {
        $productshow = Product::findOrFail($id);
        $param =[
            'productshow'=>$productshow,
        ];

        // $productshow-> show();
        return view('shop.layouts.show',  $param );
    }
    public function update($id)
    {
        // if ($request->id && $request->quantity) {
        //     $cart = session()->get('cart');
        //     $cart[$request->id]["quantity"] = $request->quantity;
        //     $totalCart = number_format(($cart[$request->id]["price"]) * $cart[$request->id]["quantity"]);
        //     $totalAllCart = 0;
        //     $TotalAllRefreshAjax = 0;
        //     foreach ($cart as $id => $details) {
        //         $totalAllCart = $details['price'] * $details['quantity'];
        //         $TotalAllRefreshAjax += $totalAllCart;
        //     }
        //     session()->put('cart', $cart);
        //     session()->flash('message', 'Cart updated successfully');
        //     return response()->json([
        //         'status' => 'cập nhật thành công',
        //         'totalCart' => '' . $totalCart,
        //         'TotalAllRefreshAjax' => '' . number_format($TotalAllRefreshAjax),
        //     ]);
        // }
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

            $id = Auth::guard('customers')->user()->id;
            $data = Order::find($id);
            $data->address = $request->address;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->save();

            $order = new Order();
            $order->customer_id = Auth::guard('customers')->user()->id;
            $order->date_at = date('Y-m-d H:i:s');
            $order->total = $request->totalAll;
            $order->save();

                $count_product = count($request->product_id);
                for ($i = 0; $i < $count_product; $i++) {
                    $orderItem = new OrderDetail();
                    $orderItem->order_id =  $order->id;
                    $orderItem->product_id = $request->product_id[$i];
                    $orderItem->quantity = $request->amount[$i];
                    $orderItem->total = $request->total[$i];
                    $orderItem->save();
                    session()->forget('cart');
                    DB::table('products')
                        ->where('id', '=', $orderItem->product_id)
                        ->decrement('amount', $orderItem->quantity);
                }

                return redirect()->route('shop');
    }
    
   

}
