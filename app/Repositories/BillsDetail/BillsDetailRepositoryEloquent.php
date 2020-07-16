<?php

namespace App\Repositories\BillsDetail;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BillsDetail\BillsDetailRepository;
use App\Entities\BillsDetail\BillsDetail;
use App\Validators\BillsDetail\BillsDetailValidator;

/**
 * Class BillsDetailRepositoryEloquent.
 *
 * @package namespace App\Repositories\BillsDetail;
 */
class BillsDetailRepositoryEloquent extends BaseRepository implements BillsDetailRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BillsDetail::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function reportTopProduct() {
        return $this->model
            ->with('product')
            ->orderBy('qty','DESC')
            ->groupBy('product_id')
            ->limit(5)
            ->get();
    }

}
