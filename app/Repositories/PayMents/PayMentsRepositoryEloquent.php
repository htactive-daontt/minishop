<?php

namespace App\Repositories\PayMents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PayMents\PayMentsRepository;
use App\Entities\PayMents\PayMents;
use App\Validators\PayMents\PayMentsValidator;

/**
 * Class PayMentsRepositoryEloquent.
 *
 * @package namespace App\Repositories\PayMents;
 */
class PayMentsRepositoryEloquent extends BaseRepository implements PayMentsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PayMents::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
