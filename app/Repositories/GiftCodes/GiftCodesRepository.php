<?php

namespace App\Repositories\GiftCodes;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface GiftCodesRepository.
 *
 * @package namespace App\Repositories\GiftCodes;
 */
interface GiftCodesRepository extends RepositoryInterface
{
    public function findCode($code);
}
