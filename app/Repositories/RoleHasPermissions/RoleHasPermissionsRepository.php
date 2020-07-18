<?php

namespace App\Repositories\RoleHasPermissions;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RoleHasPermissionsRepository.
 *
 * @package namespace App\Repositories\RoleHasPermissions;
 */
interface RoleHasPermissionsRepository extends RepositoryInterface
{
    public function getRole($id);
}
