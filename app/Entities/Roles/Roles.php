<?php

namespace App\Entities\Roles;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Roles.
 *
 * @package namespace App\Entities\Roles;
 */
class Roles extends Model implements Transformable
{
    use TransformableTrait;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role'
    ];

}
