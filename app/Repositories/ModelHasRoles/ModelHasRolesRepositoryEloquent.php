<?php

namespace App\Repositories\ModelHasRoles;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ModelHasRoles\ModelHasRolesRepository;
use App\Entities\ModelHasRoles\ModelHasRoles;
use App\Validators\ModelHasRoles\ModelHasRolesValidator;

/**
 * Class ModelHasRolesRepositoryEloquent.
 *
 * @package namespace App\Repositories\ModelHasRoles;
 */
class ModelHasRolesRepositoryEloquent extends BaseRepository implements ModelHasRolesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ModelHasRoles::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
