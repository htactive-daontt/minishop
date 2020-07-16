<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\Comments\CommentsRepository;
use App\Repositories\Contacts\ContactsRepository;
use App\Repositories\News\NewsRepository;
use App\Repositories\Products\ProductsRepository;
use App\Repositories\Slides\SlidesRepository;
use App\Repositories\PayMents\PayMentsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __construct(
        ProductsRepository $productsRepository,
        SlidesRepository $slidesRepository,
        NewsRepository $newsRepository,
        PayMentsRepository $paymentRepository,
        ContactsRepository $contactsRepository,
        CommentsRepository $commentsRepository
    )
    {
        $this->repository = $productsRepository;
        $this->slideRepository = $slidesRepository;
        $this->newRepository = $newsRepository;
        $this->paymentRepository = $paymentRepository;
        $this->contactRepo = $contactsRepository;
        $this->commentRepo = $commentsRepository;
    }

    public function index() {
        $data = [
            'products' => $this->repository->getProductsHome(),
            'slides'    => $this->slideRepository->all(),
            'news'  => $this->newRepository->getNewsHome()
        ];

        return view('home.index', compact('data'));
    }

    public function categories($slug, $id) {
        $productsOfCategories = $this->repository->getProductsOfCategories($id);

        return view('home.page.categories', compact('productsOfCategories'));
    }

    public function product($slug, $id) {
        $objectProduct = $this->repository->getProductById($id);
        $objectProduct->images = json_decode($objectProduct->images, true);
        $productsRelate = $this->repository->getProductsRelate($id, $objectProduct->category->id);

        return view('home.page.product', compact('objectProduct','productsRelate'));
    }

    public function contact() {
        return view('home.page.contact');
    }

    public function checkout() {
        if( Auth::check() ) {
            $payMents = $this->paymentRepository->all();

            return view('home.page.checkout', compact('payMents'));
        }else {
            return redirect()->route('home.page.login')->with([
                'error' => 'Vui lòng đăng nhập để mua hàng'
            ]);
        }
    }

    public function news() {
        $news = $this->newRepository->all();

        return view('home.page.news', compact('news'));
    }

    public function newDetail($id) {
        $newDetail = $this->newRepository->where('id',$id)->with('creator')->first();

        return view('home.page.new_detail', compact('newDetail'));
    }

    public function postContact(Request $request) {
        $creted = $this->contactRepo->create($request->except('_token'));

        return redirect()->back()->with(['msg'=>'Phản hồi của bạn đã gởi thành công, vui lòng đợi email phản hồi']);
    }

    public function comment(Request $request, $id) {
        $data = [
            'content' => $request->get('content'),
            'user_id'   => Auth::id(),
            'product_id' => $id
        ];

        $created = $this->commentRepo->create($data);

        return redirect()->back();

    }
}
