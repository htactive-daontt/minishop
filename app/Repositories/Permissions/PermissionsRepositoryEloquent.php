<?php

namespace App\Repositories\Permissions;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Permissions\PermissionsRepository;
use App\Entities\Permissions\Permissions;
use App\Validators\Permissions\PermissionsValidator;

/**
 * Class PermissionsRepositoryEloquent.
 *
 * @package namespace App\Repositories\Permissions;
 */
class PermissionsRepositoryEloquent extends BaseRepository implements PermissionsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permissions::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
