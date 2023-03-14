<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('admin.auth.login');
        }
    }

    public function postLogin(Request $request)
    {
        $messages = [
            "email.exists" => "Email không được để trống",
            "password.exists" => "Mật khẩu không được để trống",
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'exists:users,email',
            'password' => 'exists:users,password',
        ], $messages);
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function forgot_password()
    {
        return view('admin.Auth.forgot_password');
    }
    public function post_forgot_password(Request $request)//quen mat khau
    {
        $customer = User::where('email', $request->email)->first();
        if ($customer) {
            $pass = Str::random(6);
            $customer->password = bcrypt($pass);
            $customer->save();
            $data = [
                'name' => $customer->name,
                'pass' => $pass,
                'email' => $customer->email,
            ];
            Mail::send('admin.Auth.password', compact('data'), function ($email) use ($customer) {
                $email->subject('Shop ');
                $email->to($customer->email, $customer->name);
            });           
        }
        return redirect()->route('login');
    }
}
