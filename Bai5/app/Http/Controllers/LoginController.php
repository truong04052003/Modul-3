<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function register()
    {
        return view('admin.logins.register');
    }
    public function checkregister(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
        ]);

        $notifications = [
            'ok' => 'ok',
        ];
        $notification = [
            'message' => 'error',
        ];
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        try {
            $user->save();
            return redirect()->route('viewlogin');
        } catch (\Exception $e) {
            Log::error("message:".$e->getMessage());
        }

            if ($request->password == $request->confirmpassword) {
                $user->save();
                return redirect()->route('viewlogin')->with($notifications);
            }else{
                return redirect()->route('admin.register')->with($notification);

            }
    }
    public function viewlogin()
    {
        return view('admin.logins.login');
    }
  //xử lí đăng nhập
  public function login(Request $request){
    $validated = $request->validate([
        'email' => 'required',
        'password'=>'required|min:6',
    ],
        [
            'email.required'=>'Không được để trống',
            'password.required'=>'Không được để trống',
            'password.min'=>'Lớn hơn :min',
        ]
);

      $credentials = $request->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
      ]);

      if (Auth::attempt($credentials)) {

          $request->session()->regenerate();

          return redirect()->route('products.index');
      }
      // dd($request->all());
      return back()->withErrors([
          'email' => 'Thông tin đăng nhập không khớp với hồ sơ của chúng tôi.',
      ])->onlyInput('email');
  }


    public function checklogin(Request $request)
    {

            $arr = [
                'email' => $request->email,
                'password' => $request->password
            ];
            // if (Auth::guard('users')->attempt($arr)) {
                return redirect()->route('products.index');
            // } else {
            //     return redirect()->route('viewlogin');
            // }

    }
    public function logout(Request $request)
    {
        // Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('viewlogin');
    }
}