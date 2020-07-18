<?php

namespace App\Repositories\ModelHasPermissions;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ModelHasPermissions\ModelHasPermissionsRepository;
use App\Entities\ModelHasPermissions\ModelHasPermissions;
use App\Validators\ModelHasPermissions\ModelHasPermissionsValidator;

/**
 * Class ModelHasPermissionsRepositoryEloquent.
 *
 * @package namespace App\Repositories\ModelHasPermissions;
 */
class ModelHasPermissionsRepositoryEloquent extends BaseRepository implements ModelHasPermissionsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ModelHasPermissions::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getPermissionRole($id) {
        return $this->model->where('model_id', $id)->get()->toArray();
    }

}
