<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\Users\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Access\AuthorizationException;

class VerifyController extends Controller
{
    public function __construct(UsersRepository $usersRepository)
    {
        $this->repository = $usersRepository;
    }

    public function resend(Request $request) {
        if ( $request->user()->hasVerifiedEmail() ) {
            return redirect()->back()->with(['msg'=>'Tài khoản đã được xác thực']);
        }else {
            $request->user()->sendApiEmailVerificationNotification();
            return redirect()->back()->with(['error'=>'Vui lòng xác thực tài khoản']);
        }
    }

    public function verify(Request $request) {
        $user = $this->repository->find($request->id);

        if (!hash_equals((string)$request->route('id'), (string)$user->id)) {
            throw new AuthorizationException;
        }

        if (!hash_equals((string)$request->hash, sha1( $user->email ))) {
            throw new AuthorizationException;
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('home.page.login')->with(['msg'=>'Tài khoản này đã được xác thực']);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        /*if ($response = $this->verified($request)) {
            return $response;
        }*/

        return redirect()->route('home.page.login')->with(['msg'=>'Tài khoản của bạn đã được xác thực, bạn có thể đăng nhập']);
    }
}

