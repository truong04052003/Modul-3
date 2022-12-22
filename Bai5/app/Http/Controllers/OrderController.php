<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $items = Order::all();
        // $items = DB::table('categories')->get();
        // select * from categories
        // dd($items);
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
