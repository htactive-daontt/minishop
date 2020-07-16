<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\Bills\BillsRepository;
use App\Repositories\Users\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(UsersRepository $repository, BillsRepository $billsRepository)
    {
        $this->userRepository = $repository;
        $this->billRepository = $billsRepository;
    }

    public function index() {
        if (Auth::check()) {
            return view('home.page.user');
        }else {
            return redirect()->route('home.index');
        }
    }

    public function updateInfo($id, Request $request) {
        $update = $this->userRepository->updateUser($request->except('_token'),$id);

        return redirect()->back()->with(['msg'=>$update]);
    }

    public function billBought($id, $status) {
        $bills = $this->billRepository->getBillUser($id, $status);

        return view('home.page.my_order_approved', compact('bills'));
    }

    public function showBillDetail() {
        if ( Request()->ajax() ) {
            $id = Request()->get('id');
            $transactionDetail = $this->billRepository->transactionDetail($id);

            return  view('home.page.modal_bill_detail', compact('transactionDetail'));
        }
    }
}
