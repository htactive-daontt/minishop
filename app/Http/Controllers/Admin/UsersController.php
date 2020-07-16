<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UsersCreate;
use App\Http\Requests\Users\UsersUpdate;
use App\Repositories\Users\UsersRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct(UsersRepository $usersRepository)
    {
        $this->repository = $usersRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->getUsers();


        return  view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->repository->getRoles();

        return view('admin.users.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersCreate $request)
    {
        $create = $this->repository->createUser($request->except('_token'));

        return redirect()
            ->route('admin.users.get')
            ->with(['msg',$create]);
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
            'user' => $this->repository->find($id)->first(),
            'roles' => $this->repository->getRoles()
        ];

        $user = $this->repository->find($id);
        $user->givePermissionTo('bill-list');

        return view('admin.users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersUpdate $request, $id)
    {
        $updated = $this->repository->updateUser($request->except('_token'), $id);


        return redirect()
            ->route('admin.users.get')
            ->with(['msg', $updated]);
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
                ->route('admin.users.get')
                ->with(['msg','Xóa thành công']);
    }
}
