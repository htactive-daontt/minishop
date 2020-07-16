<?php

namespace App\Repositories\News;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NewsRepository.
 *
 * @package namespace App\Repositories\News;
 */
interface NewsRepository extends RepositoryInterface
{
    public function getNews();

    public function createNews($data);

    public function updateNew($data, $id);

    public function getNewsHome();
}
