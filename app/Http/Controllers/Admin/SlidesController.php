<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slides\SlidesCreate;
use App\Repositories\Slides\SlidesRepository;
use Illuminate\Http\Request;

class SlidesController extends Controller
{
    public function __construct(SlidesRepository $slidesRepository)
    {
        $this->repository = $slidesRepository;

        $this->middleware('permission:slide-list', ['only' => ['index']]);
        $this->middleware('permission:slide-create', ['only' => ['create','store']]);
        $this->middleware('permission:slide-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:slide-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataOfSlides = $this->repository->getSlides();

        return view('admin.slides.index', compact('dataOfSlides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slides.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlidesCreate $request)
    {
        $dataOfSlide = $request->except('_token');
        $cretea = $this->repository->createSlide($dataOfSlide);

        return redirect()
                ->route('admin.slides.get')
                ->with(['msg'=>$cretea]);
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

        return view('admin.slides.edit', compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updated = $this->repository->updateSlide($request->except('_token'), $id);

        return redirect()
            ->route('admin.slides.get')
            ->with(['msg'=>$updated]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->repository->deleteSlide($id);

        return redirect()
            ->route('admin.slides.get')
            ->with(['msg'=>$delete]);
    }
}
