<?php

namespace App\Entities\BillsDetail;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class BillsDetail.
 *
 * @package namespace App\Entities\BillsDetail;
 */
class BillsDetail extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = 'bills_detail';
    protected $fillable = [
        'bill_id','product_id','qty','total'
    ];

    public function product() {
        return $this->belongsTo('App\Entities\Products\Products','product_id');
    }

}
