<?php

namespace App\Repositories\Slides;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SlidesRepository.
 *
 * @package namespace App\Repositories\Slides;
 */
interface SlidesRepository extends RepositoryInterface
{
    public function getSlides();

    public function createSlide($data);

    public function deleteSlide($id);

    public function updateSlide($data, $id);
}
