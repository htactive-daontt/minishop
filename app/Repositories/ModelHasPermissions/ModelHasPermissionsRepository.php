<?php

namespace App\Repositories\ModelHasPermissions;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ModelHasPermissionsRepository.
 *
 * @package namespace App\Repositories\ModelHasPermissions;
 */
interface ModelHasPermissionsRepository extends RepositoryInterface
{
    public function getPermissionRole($id);
}
