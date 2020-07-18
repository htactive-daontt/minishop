<?php

namespace App\Entities\ModelHasRoles;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ModelHasRoles.
 *
 * @package namespace App\Entities\ModelHasRoles;
 */
class ModelHasRoles extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'model_type', 'model_id'
    ];

}
