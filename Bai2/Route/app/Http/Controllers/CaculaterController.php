<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaculaterController extends Controller
{
    function tinhController(Request $request){
        switch ($request->calculation) {
          case '+':
              $result = $request->number1 + $request->number2;
              break;
          case '-':
              $result = $request->number1 - $request->number2;
              break;
          case '*':
              $result = $request->number1 * $request->number2;
              break;
          case '/':
              $result = $request->number1 / $request->number2;
              break;
          default:
          $result = "Không có Phép TÍnh";
              break;
        }
        return view('caculater', compact('result'));
      }
}
