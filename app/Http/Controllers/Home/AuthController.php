<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginHomeRequest;
use App\Http\Requests\Login\RegisterHomeRequest;
use App\Repositories\Users\UsersRepository;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct(UsersRepository $usersRepository)
    {
        $this->userRepository = $usersRepository;
    }

    public function login() {
        return view('home.auth.login');
    }

    public function postLogin(LoginHomeRequest $request) {
        $user    = $request->only('email', 'password');
        $login = $this->userRepository->login($user);

        return redirect()->route($login['route'])->with($login['message']);
    }

    public function register() {
        return view('home.auth.register');
    }

    public function postRegister(RegisterHomeRequest $request) {
       $createdMessage = $this->userRepository->createCustomer($request->except('_token'));

       return redirect()->back()->with([
           'msg' => $createdMessage
        ]);
    }

    public function logout() {
        Auth::logout();

        return redirect()->back();
    }
}
