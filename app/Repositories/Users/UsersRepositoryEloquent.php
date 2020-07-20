<?php

namespace App\Repositories\Users;

use App\Entities\ModelHasRoles\ModelHasRoles;
use App\Entities\Roles\Roles;

use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Users\Users;
use App\Validators\Users\UsersValidator;
use Spatie\Permission\Models\Role;


/**
 * Class UsersRepositoryEloquent.
 *
 * @package namespace App\Repositories\Users;
 */
class UsersRepositoryEloquent extends BaseRepository implements UsersRepository
{
    use VerifiesEmails;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Users::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getUsers() {
        return Users::all();
    }

    public function getRoles()
    {
        return Roles::all();
    }

    public function createUser($data, $role) {
        $data['password'] = Hash::make($data['password']);

        $create = $this->create($data);
        $create->assignRole($role);
        if ($create) {
            $create->sendEmailVerificationNotification();
            return 'Thêm thành công' ;
        }
    }

    public function updateUser($data, $role, $id) {
        if ( !empty($data['password']) ) {
            $data['password'] = Hash::make($data['password']);
        }else {
            $user = $this->find($id)->first();
            $data['password'] = $user->password;
        }

        $update = $this->update($data, $id);
        $user = $this->find($id);

        $roleOld = ModelHasRoles::where('model_id', $id)->first();
        $user->removeRole($roleOld->role_id);
        $user->assignRole($role);

        return 'Cập nhập thành công';

    }

    public function createCustomer($data) {

        $data['password'] = Hash::make($data['password']);

        $create = $this->create($data);
        $create->assignRole(3);
        $create->sendEmailVerificationNotification();

        return 'Đăng ký thành công, vui lòng kiểm tra email để xác nhận tài khoản';
    }

    public function login($user)
    {
        if (Auth::guard('web')->attempt($user)) {
            if (empty(Auth::user()->email_verified_at)) {
                Auth::logout();
                return [
                    'route' => 'home.page.login',
                    'message' => ['error'=>'Vui lòng kích hoạt email']
                ];
            }

            return [
                'route' => 'home.index',
                'message' => ['msg'=>'Đăng nhập thành công']
            ];
        }else {
            return [
                'route' => 'home.page.login',
                'message' => ['error'=>'Đăng nhập không thành công']
            ];
        }
    }
}
