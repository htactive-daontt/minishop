<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Checkout\CheckoutRequest;
use App\Http\Requests\Checkout\UpdateUserRequest;
use App\Repositories\Users\UsersRepository;
use App\Repositories\Bills\BillsRepository;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function __construct(UsersRepository $usersRepository,BillsRepository $billsRepository)
    {
        $this->userRepository = $usersRepository;
        $this->billRepository = $billsRepository;
    }

    public function store() {
        if (Request()->ajax()) {
            $payment = Request()->get('id_pay');
            $status = Request()->get('status');

            $createMessage = $this->billRepository->checkout($payment, $status);

            return response()->json([
                'message' => $createMessage,
                'status' => true,
            ]);
        }
    }

    public function updateUser(UpdateUserRequest $request) {

        $updated = $this->userRepository->update( $request->except('_token'), Auth::id() );

        return redirect()->back()->with(['msg_user'=>'Cập nhập thành công']);
    }
}
