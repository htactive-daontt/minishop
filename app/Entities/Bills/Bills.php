<?php

namespace App\Entities\Bills;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Bills.
 *
 * @package namespace App\Entities\Bills;
 */
class Bills extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = 'bills';

    protected $fillable = [
        'total','tax','discount','payment_id','user_id','status','total_pay'
    ];

    public function user() {
        return $this->belongsTo('App\Entities\Users\Users','user_id');
    }
    public function payment() {
        return $this->belongsTo('App\Entities\PayMents\PayMents','payment_id');
    }
    public function bills_detail() {
        return $this->hasMany('App\Entities\BillsDetail\BillsDetail','bill_id')->with('product');
    }
    public function product() {
        return $this->hasMany('App\Entities\Products\Products','product_id');
    }
}
