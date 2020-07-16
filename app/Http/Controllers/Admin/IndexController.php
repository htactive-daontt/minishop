<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Bills\BillsRepository;
use App\Repositories\News\NewsRepository;
use App\Repositories\Products\ProductsRepository;
use App\Repositories\Users\UsersRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(
        ProductsRepository $productsRepository,
        NewsRepository $newsRepository,
        BillsRepository $billsRepository,
        UsersRepository $usersRepository
    )
    {
        $this->product = $productsRepository;
        $this->news = $newsRepository;
        $this->bills = $billsRepository;
        $this->users = $usersRepository;
    }

    public function index() {
        $arCount = [
            'product' => count($this->product->all()),
            'new'=> count($this->news->all()),
            'order' => count($this->bills->all()),
            'user' => count($this->users->all()),
        ];
        return view('admin.index', compact('arCount'));
    }
}
