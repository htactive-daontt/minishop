<?php

namespace App\Entities\Comments;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Comments.
 *
 * @package namespace App\Entities\Comments;
 */
class Comments extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content','user_id','product_id'
    ];

    public function user() {
        return $this->belongsTo('App\Entities\Users\Users','user_id');
    }
}
