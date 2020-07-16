<?php

namespace App\Entities\PayMents;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PayMents.
 *
 * @package namespace App\Entities\PayMents;
 */
class PayMents extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = 'payments';
    protected $fillable = [
        'pay_ment'
    ];

}
