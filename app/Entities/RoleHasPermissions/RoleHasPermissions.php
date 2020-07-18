<?php

namespace App\Entities\RoleHasPermissions;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class RoleHasPermissions.
 *
 * @package namespace App\Entities\RoleHasPermissions;
 */
class RoleHasPermissions extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permission_id','role_id'
    ];

}
