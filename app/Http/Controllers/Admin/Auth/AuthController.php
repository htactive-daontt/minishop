<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request) {
        $user = $request->only(['email','password']);

        if ( Auth::guard('admin')->attempt($user) ) {

            return redirect()->route('admin.index');
        }else {
            return redirect()->back()->with(['error'=>'Sai mật khẩu hoặc tài khoản']);
        }
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('admin.auth.login');
    }
}
