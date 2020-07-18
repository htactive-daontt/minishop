<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Permissions\Permissions;
use App\Repositories\ModelHasPermissions\ModelHasPermissionsRepository;
use App\Repositories\Permissions\PermissionsRepository;
use App\Repositories\RoleHasPermissions\RoleHasPermissionsRepository;
use App\Repositories\Roles\RolesRepository;
use App\Repositories\Users\UsersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesUserController extends Controller
{
    public function __construct
    (
        UsersRepository $usersRepository,
        RolesRepository $repository,
        PermissionsRepository $permissionsRepository,
        RoleHasPermissionsRepository $roleHasPermissionsRepository
    )
    {
        $this->userRepo = $usersRepository;
        $this->roleRepostory = $repository;
        $this->permissionsRepo = $permissionsRepository;
        $this->roleHasPermissionRepo = $roleHasPermissionsRepository;

        $this->middleware('permission:auth-list', ['only' => ['index']]);
        $this->middleware('permission:auth-edit', ['only' => ['edit','postEdit']]);
    }

    public function index() {
        $roles = $this->roleRepostory->all();

        return view('admin.roles.index', compact('roles'));
    }

    public function edit($id) {
        $role = $this->roleRepostory->find($id);
        $permissions = $this->permissionsRepo->all();
        $checked = $this->roleHasPermissionRepo->getRole($id);
       // dd($checked);
        return view('admin.roles.edit', compact('role','permissions','checked'));
    }

    public function postEdit($id, Request $request) {
        $role = $this->roleRepostory->find($id);
        //dd($request->get('role'));
        $role->syncPermissions($request->get('role'));

        return redirect()->back()->with(['msg','Cập nhập thành công']);
    }
}
