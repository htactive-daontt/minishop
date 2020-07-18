<?php

namespace App\Repositories\Roles;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Spatie\Permission\Models\Role;
use App\Validators\Roles\RolesValidator;

/**
 * Class RolesRepositoryEloquent.
 *
 * @package namespace App\Repositories\Roles;
 */
class RolesRepositoryEloquent extends BaseRepository implements RolesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getRoles() {
        return $this->model->pluck('roles.name','roles.id')->all();
    }

}
