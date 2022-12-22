<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //trang chủ
    public function profile(){
        if (Auth::check()) {
            return view('admin.layouts.main');
        } else{
            return view('admin.register');
        }
    }
   
    //đăng kí
    public function formregister(){
        return view('admin.logins.register');
    }
    public function register(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email; 
        $user->password = bcrypt($request->password);
        if( $request->passwordagain == $request->password ){
            $user->save();
            return redirect()->route('formlogin');
        }else{
            return redirect()->route('profile');
        }
    }

     //đăng nhập
    public function formlogin(){
        if (Auth::check()) {
            return view('admin.layouts.main');
        } else{
            return view('admin.logins.login');
        }
    }
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
            return redirect()->route('profile');
        }else{
            return view('admin.logins.login');
        }
    }

    // đăng xuất
    public function logout(){
        Auth::logout();
        return redirect()->route('formlogin');
    }

    // form cập nhật tài khoản
    public function setting(){
        return view(' admin.updatesetting ');
    }

    // cập nhật tài khoản
    public function settied(Request $request){
        $users = User::find(auth()->id());
        // dd($request);
        if($request->change_password == 'on'){
            $users->password = bcrypt($request->password);
        };
        $users->save();
        return view('admin.includes.content');
    }
   
}