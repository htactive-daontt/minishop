<?php

namespace App\Repositories\Contacts;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contacts\ContactsRepository;
use App\Entities\Contacts\Contacts;
use App\Validators\Contacts\ContactsValidator;

/**
 * Class ContactsRepositoryEloquent.
 *
 * @package namespace App\Repositories\Contacts;
 */
class ContactsRepositoryEloquent extends BaseRepository implements ContactsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Contacts::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
