<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductsCreate;
use App\Http\Requests\Products\ProductsUpdate;
use App\Repositories\Comments\CommentsRepository;
use App\Repositories\Products\ProductsRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct(
        ProductsRepository $productsRepository,
        CommentsRepository $commentsRepository
    )
    {
        $this->repository = $productsRepository;
        $this->commentRepo = $commentsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataOfProducts = $this->repository->getProducts();

        return view('admin.products.index', compact('dataOfProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->repository->getCategories();
        return view('admin.products.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsCreate $request)
    {

        $create = $this->repository->createProduct($request->all());

        return redirect()
                ->route('admin.products.get')
                ->with(['msg'=>$create]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'product' => $this->repository->getProductById($id),
            'categories'   => $this->repository->getCategories()
        ];

        return view('admin.products.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsUpdate $request, $id)
    {
        $update = $this->repository->updateProduct($id, $request->all());

        return redirect()
                ->route('admin.products.get')
                ->with(['msg'=>$update]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = $this->repository->destroyProduct($id);

        return redirect()->back()->with(['msg'=>$destroy]);
    }

    public function viewComment($slug, $id) {
        $product = $this->repository->getProductById($id);

        if (!$product->comment_count>0) return redirect()->route('admin.products.get');

        $comments = $this->commentRepo->getCommentByProduct($id);

        return view('admin.products.comment', compact('product','comments'));
    }

    public function delComment($id) {
        $delete = $this->commentRepo->delete($id);

        if ($delete) return redirect()->back()->with(['msg','Xóa thành công']);

        return redirect()->back()->with(['msg','Có lỗi xảy ra']);
    }

    public function addQty() {
        if (Request()->ajax()) {
            $id = Request()->get('id');
            $qty = Request()->get('qty');

            $update = $this->repository->update(['qty'=>$qty],$id);

            return true;
        }
    }
}
