<?php

namespace App\Repositories\Categories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CategoriesRepository.
 *
 * @package namespace App\Repositories\Categories;
 */
interface CategoriesRepository extends RepositoryInterface
{
    public function getCategories();

    public function created($array);

    public function status($id);
}
