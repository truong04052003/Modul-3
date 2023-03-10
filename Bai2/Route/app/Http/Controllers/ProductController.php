<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //TẠO CONTROLLER + PHƯƠNG THỨC
    public function index(){
        echo "Trang";
        return view('product.index');
    }
    public function create(){
        return view('product.create');

    }
    public function store(){

    }
    public function show($id){
        return view('product.show');

    }
    public function edit($id){
        return view('product.edit');
    }
    public function update($id){

    }
    public function destroy($id){

    }
}
