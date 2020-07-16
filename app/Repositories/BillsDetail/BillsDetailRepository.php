<?php

namespace App\Repositories\BillsDetail;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BillsDetailRepository.
 *
 * @package namespace App\Repositories\BillsDetail;
 */
interface BillsDetailRepository extends RepositoryInterface
{
    public function reportTopProduct();
}
