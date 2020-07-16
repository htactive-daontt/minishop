<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CategoriesCreate;
use App\Http\Requests\Categories\CategoriesUpdate;
use App\Repositories\Categories\CategoriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->repository = $categoriesRepository;

        $this->middleware('permission:category-list', ['only' => ['index','status']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataOfCategories = $this->repository->getCategories();
        return view('admin.categories.index', compact('dataOfCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoreies = $this->repository->all();

        return view('admin.categories.add', compact('categoreies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesCreate $request)
    {
        $dataOfAddCat = [
            'name' => $request->get('namecat'),
            'parent_id' => $request->get('idsub'),
            'status'    => true
        ];

        $creted = $this->repository->created($dataOfAddCat);
        return redirect()
            ->route('admin.categories.get')
            ->with(['msg'=> $creted]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status = $this->repository->status($id);

        return  redirect()->back()->with(['msg'=>$status]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataOfUpdate = [
            'objectEdit' => $this->repository->find($id),
            'categories'    => $this->repository->all()
        ];
        return view('admin.categories.edit', compact('dataOfUpdate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesUpdate $request, $id)
    {
        $object = $this->repository->find($id);

        $object->name = $request->get('editnamecat');
        $object->parent_id = $request->get('editidsub');
        $object->slug = Str::slug($request->get('editnamecat'));

        $updated = $object->update();
        if ($updated) {
            return redirect()
                ->route('admin.categories.get')
                ->with(['msg'=> 'Cập nhập thành công']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objectDestroy = $this->repository->delete($id);

        return redirect()
            ->route('admin.categories.get')
            ->with(['msg'=>'Xóa thành công']);
    }
}
