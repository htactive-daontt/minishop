<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShoppingCart\ShoppingCartCreate;
use App\Repositories\GiftCodes\GiftCodesRepository;
use App\Repositories\Products\ProductsRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function __construct(ProductsRepository $productsRepository, GiftCodesRepository $giftCodesRepository)
    {
        $this->productRepository = $productsRepository;
        $this->giftCodeRepository = $giftCodesRepository;
    }

    public function index() {
        dd(str_replace(',','',Cart::subtotal(0,3)));
        return view('home.page.cart');
    }

    public function store(ShoppingCartCreate $request, $id) {
        $product = $this->productRepository->getProductById($id);
        $price = $product->price;
        if ($product->sale >0) {
            $price = $product->price - $product->price*$product->sale /100;
        }

        Cart::add([
            'id'    => $product->id,
            'name'  => $product->name,
            'qty'   => $request->get('qty'),
            'price' => $price,
            'weight'    => 0,
            'options'   => [
                'category'  => $product->category->name,
                'thumbnail' => $product->thumbnail
            ]
        ]);

        return redirect()->route('home.shopping.index');
    }

    public function remove($id) {
        Cart::remove($id);

        return redirect()->route('home.shopping.index');
    }

    public function destroy() {
        Cart::destroy();

        return redirect()->route('home.shopping.index');
    }

    public function update() {
        if(Request()->ajax()) {
            $rowId = Request()->get('id');
            $qty = Request()->get('qty');

            if ($qty ==0) {
                Cart::remove($rowId);

                return 1;
            }else {
                Cart::update($rowId, $qty);

                $response = [
                    'product' =>  Cart::get($rowId)->subtotal(0).' đ',
                    'subTotal'  => Cart::subtotal(0).' đ',
                    'tax'   => Cart::tax(0).' đ',
                    'total' => Cart::total(0).' đ'
                ];

                return response()->json($response);
            }
        }
    }

    public function giftCode(Request $request) {
        $param = $request->get('code');
        $code = $this->giftCodeRepository->findCode($param);

        if (!empty($code)) {
            Cart::setGlobalDiscount($code->value);
            Session::remove('gift');
            Session::put('gift', $code->id);

            return redirect()
                ->route('home.shopping.index')
                ->with(['msg'=>'Bạn được giảm '.$code->value.' % với mã: '.$code->code]);
        }else {
            return redirect()
                ->route('home.shopping.index')
                ->with(['msg'=>'Mã bạn vừa nhập không khả dụng']);
        }
    }
}
