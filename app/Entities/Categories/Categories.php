<?php

namespace App\Entities\Categories;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Categories.
 *
 * @package namespace App\Entities\Categories;
 */
class Categories extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','parent_id','status'
    ];

    public function category() {
        return $this->hasMany('App\Entities\Categories\Categories','parent_id');
    }

    public function products() {
        return $this->hasMany('App\Entities\Products\Products','category_id');
    }

}
