<?php

namespace App\Repositories\Comments;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Comments\CommentsRepository;
use App\Entities\Comments\Comments;
use App\Validators\Comments\CommentsValidator;

/**
 * Class CommentsRepositoryEloquent.
 *
 * @package namespace App\Repositories\Comments;
 */
class CommentsRepositoryEloquent extends BaseRepository implements CommentsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Comments::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getCommentByProduct($id) {
        return $this->model->where('product_id', $id)->with('user')->paginate(5);
    }
}
