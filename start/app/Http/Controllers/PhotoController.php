<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $email      = 'a@gmail.com';

        // return view('photos.index')->with('ho_va_ten',$ho_va_ten)->with('email',$email);
        // $params = [
        //     'ho_va_ten' => $ho_va_ten,
        //     'email' => $email,
        // ];
        // return view('photos.index', $params);

        return view('admin.photos.index',compact('email'));
    }
    public function create()
    {   
        $params =[
              
        ];
        return view('photos.create',$params);
        

    }
    public function store(Request $request)
    {
        dd( $request->all() );
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
