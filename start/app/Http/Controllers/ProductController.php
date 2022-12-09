<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
    //    $items = Product::all();
    $items = DB::table('products')->get();
    //    $items = Product::where('id','>',5)->get();/g4
        dd($items);
    }
    public function create(){

    }
    public function store(Request $request ){

    }
    public function show($id){
        // $item = Product::find($id);
        $item = DB::table('products')->where('id','=',$id)->first();
        dd($item);
    }
    public function edit($id){

    }
    public function update(Request $request , $id){

    }
    public function destroy($id){

    }
}
