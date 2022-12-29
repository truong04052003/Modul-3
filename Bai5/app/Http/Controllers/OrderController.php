<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {
        $items = Order::all();

        return view('admin.orders.index' , compact('items'));
        
    }

   
    public function create()
    {
        return view('admin.orders.create');
    }

   
    public function store(Request $request)
    {
        $order = new Order();
        $order->total = $request->total;
        $order->save();

        return redirect()->route('orders.index');
    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $order = Order::find($id);
        // dd($product);
        return view('admin.orders.edit', compact('order'));
    }

 
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->total = $request->total;
        $order->save();
        return redirect()->route('orders.index');
    }

  
    public function destroy($id)
    {
        Order::find($id)->delete();
        return redirect()->route('orders.index');
    }
    public function detail($id)
    {
        $this->authorize('view', Order::class);
        $items= DB::table('order_detail')
        ->join('orders','order_detail.order_id','=','orders.id')
        ->join('products','order_detail.product_id','=','products.id')
        ->select('products.*', 'order_detail.*','orders.id')
        ->where('orders.id','=',$id)->get();
        return view('admin.orders.orderdetail',compact('items'));
    }
    
}
