<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UsersCreate;
use App\Http\Requests\Users\UsersUpdate;
use App\Repositories\Roles\RolesRepository;
use App\Repositories\Users\UsersRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct
    (
        UsersRepository $usersRepository,
        RolesRepository $rolesRepository
    )
    {
        $this->repository = $usersRepository;
        $this->roleRepo = $rolesRepository;

        $this->middleware('permission:user-list', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->getUsers();
        $role = $this->roleRepo->getRoles();

        return  view('admin.users.index', compact('users','role'));
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
        $role = $request->get('role_id');
        $create = $this->repository->createUser($request->except(['_token','role_id']), $role);

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
        $role = $request->get('role_id');
        $updated = $this->repository->updateUser($request->except(['_token','role_id']), $role,$id);


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
