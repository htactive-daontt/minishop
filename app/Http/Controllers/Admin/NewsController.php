<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsCreate;
use App\Repositories\News\NewsRepository;
use Illuminate\Http\Request;
use App\Http\Requests\News\NewsUpdate;

class NewsController extends Controller
{

    public function __construct(NewsRepository $newsRepository)
    {
        $this->repository = $newsRepository;

        $this->middleware('permission:news-list', ['only' => ['index']]);
        $this->middleware('permission:news-create', ['only' => ['create','store']]);
        $this->middleware('permission:news-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:news-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = $this->repository->getNews();
       
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreate $request)
    {
        $create = $this->repository->createNews($request->all());

        return redirect()
                ->route('admin.news.get')
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
        $object = $this->repository->find($id);

        return view('admin.news.edit', compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdate $request, $id)
    {
        $update = $this->repository->updateNew($request->except('_token'), $id);

        return redirect()
                ->route('admin.news.get')
                ->with(['msg'=>'Cập nhập thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        return redirect()
                ->back()
                ->with(['msg'=>'Xóa thành công']);
    }
}
