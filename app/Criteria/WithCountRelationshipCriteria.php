<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class WithCountRelationshipCriteria.
 *
 * @package namespace App\Criteria;
 */
class WithCountRelationshipCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    private $relations;

    public function __construct($relations)
    {

        $this->relations = $relations;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        return $model->withCount($this->relations);
    }
}
