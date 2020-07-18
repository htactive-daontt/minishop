<?php

namespace App\Entities\ModelHasPermissions;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ModelHasPermissions.
 *
 * @package namespace App\Entities\ModelHasPermissions;
 */
class ModelHasPermissions extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permission_id', 'model_type', 'model_id'
    ];

}
