<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //trang chủ
    public function profile()
    {
        if (Auth::check()) {
            return view('admin.layouts.main');
        } else {
            return view('admin.register');
        }
    }

    //đăng kí
    public function formregister()
    {
        return view('admin.logins.register');
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Không được để trống',
            'email.required' => 'Không được để trống',
            'password.required' => 'Không được để trống',
            'password.min' => 'Mật khẩu quá ngắn',
        ]);
        if ($validator->fails()) {
            return redirect()->route('formregister')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 1;
        $user->password = bcrypt($request->password);
        if ($request->passwordagain == $request->password) {
            $user->save();
            return redirect()->route('formlogin');
        } else {
            return redirect()->route('profile');
        }
        
    }

    //đăng nhập
    public function formlogin()
    {
       
            return view('admin.logins.login');
        
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Không được để trống',
            'password.required' => 'Không được để trống',
            'password.min' => 'Mật khẩu quá ngắn',
        ]);
        if ($validator->fails()) {
            return redirect()->route('formlogin')
                ->withErrors($validator)
                ->withInput();
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::user()->role == 0){
            return redirect()->route('products.index');
        }
        else{
            return redirect()->route('shop.index');
        }
        } else {
            return view('admin.logins.login');
        }
    }

    // đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('formlogin');
    }
    public function forgetpass(){
        return view('admin.includes.forgetpass');
    }
    public function quenmatkhau(Request $request){
        $customer = User::where('email',$request->email)->first();
        if($customer){
            $pass = Str::random(6);
            $customer->password = bcrypt($pass);
            $customer->save();
                $data = [
                    'name' => $customer->name,
                    'pass' => $pass,
                    'email' =>$customer->email,
                ];
                Mail::send('admin.email.password', compact('data'), function ($email) use($customer){
                    $email->subject('Shop Thanh Trường');
                    $email->to($customer->email, $customer->name);
                });
            }
            return redirect()->route('formlogin');
    }
}
