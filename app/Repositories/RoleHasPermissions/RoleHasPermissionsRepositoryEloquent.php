<?php

namespace App\Repositories\RoleHasPermissions;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RoleHasPermissions\RoleHasPermissionsRepository;
use App\Entities\RoleHasPermissions\RoleHasPermissions;
use App\Validators\RoleHasPermissions\RoleHasPermissionsValidator;

/**
 * Class RoleHasPermissionsRepositoryEloquent.
 *
 * @package namespace App\Repositories\RoleHasPermissions;
 */
class RoleHasPermissionsRepositoryEloquent extends BaseRepository implements RoleHasPermissionsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RoleHasPermissions::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getRole($id) {
        return $this->model->where('role_id', $id)->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')->all();
    }

}
