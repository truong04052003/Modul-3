<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
   
 
   
    public function store(Request $request)
    {
        $request->session()->put('task', 'Lean Laravel');
    }

  
    public function show(Request $request)
    {
        $value = $request->session()->get('task');
        echo $value;
    }

   
}
