<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Photos extends Controller
{
   
    public function index()
    {
        $ho_va_ten = 'tranvanA';
        $email = 'a@email.com';
        // return view('photos.index',compact('ho_va_ten','$ho_va_ten'));
        //dùng mảng 
        // $params = ['ho_va_ten' => $ho_va_ten];
        // return view('photos.index',$params );
        //dùng compact 
        return view('photos.index', compact('ho_va_ten', 'email'));

    }

  
    public function create()
    {
        $ho_va_ten = 'tranvanA';
        $params = [
            'ho_va_ten' => $ho_va_ten
        ];
        return view('photos.create',$params);
    }

 
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
