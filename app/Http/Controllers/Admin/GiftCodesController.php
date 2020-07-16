<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiftCodes\GiftCodesCreate;
use App\Http\Requests\GiftCodes\GiftCodesUpdate;
use App\Repositories\GiftCodes\GiftCodesRepository;
use Illuminate\Http\Request;

class GiftCodesController extends Controller
{

    public function __construct(GiftCodesRepository $giftCodesRepository)
    {
        $this->repository = $giftCodesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gift_codes = $this->repository->all();

        return view('admin.gift.index', compact('gift_codes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gift.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GiftCodesCreate $request)
    {
        $dataOdafGiftCode = $request->except('_token');

        $create = $this->repository->create($dataOdafGiftCode);

        return redirect()
                ->route('admin.giftcode.get')
                ->with(['msg'=>'Thêm thành công']);
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

        return view('admin.gift.edit', compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GiftCodesUpdate $request, $id)
    {
        $dataOfUpdate = $request->except('_token');
        $updated = $this->repository->update($dataOfUpdate, $id);

        return redirect()
            ->route('admin.giftcode.get')
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
            ->route('admin.giftcode.get')
            ->with(['msg'=>'Xóa thành công']);
    }
}
