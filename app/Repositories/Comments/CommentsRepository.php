<?php

namespace App\Repositories\Comments;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CommentsRepository.
 *
 * @package namespace App\Repositories\Comments;
 */
interface CommentsRepository extends RepositoryInterface
{
    public function getCommentByProduct($id);
}
