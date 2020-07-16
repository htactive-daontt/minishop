<?php

namespace App\Entities\GiftCodes;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class GiftCodes.
 *
 * @package namespace App\Entities\GiftCodes;
 */
class GiftCodes extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code','value','qty','create_day','end_day'
    ];

}
