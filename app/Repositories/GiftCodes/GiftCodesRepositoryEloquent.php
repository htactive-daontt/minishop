<?php

namespace App\Repositories\GiftCodes;

use Illuminate\Support\Carbon;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GiftCodes\GiftCodesRepository;
use App\Entities\GiftCodes\GiftCodes;
use App\Validators\GiftCodes\GiftCodesValidator;

/**
 * Class GiftCodesRepositoryEloquent.
 *
 * @package namespace App\Repositories\GiftCodes;
 */
class GiftCodesRepositoryEloquent extends BaseRepository implements GiftCodesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return GiftCodes::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findCode($code) {
        return GiftCodes::where('code', $code)
                ->whereDate('create_day', '<=',Carbon::today())
                ->whereDate('end_day', '>', Carbon::today())
                ->where('qty', '>', 0)
                ->first();
    }
}
