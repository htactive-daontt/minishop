<?php

namespace App\Repositories\Categories;

use Illuminate\Support\Str;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Categories\CategoriesRepository;
use App\Entities\Categories\Categories;
use App\Validators\Categories\CategoriesValidator;

/**
 * Class CategoriesRepositoryEloquent.
 *
 * @package namespace App\Repositories\Categories;
 */
class CategoriesRepositoryEloquent extends BaseRepository implements CategoriesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Categories::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getCategories()
    {
        $data = Categories::all();
        foreach ($data as $key => $value) {
            $parent = Categories::find($value['parent_id']);
            if(!empty($parent)) {
                $data[$key]['parent_name'] = $parent['name'];
            }else {
                $data[$key]['parent_name'] = null;
            }
        }

        return $data;
    }

    public function created($array) {
        $array['slug'] = Str::slug($array['name']);
        $create = Categories::insert($array);
        if ($create) {
            return 'Thêm thành công';
        }else {
            return 'Có lỗi xảy ra';
        }
    }

    public function status($id) {
        $object = Categories::find($id);
        if ( $object->status == 1 ) {
            $object->status = 0;
            $object->update();
        }else {
            $object->status = 1;
            $object->update();
        }
        return 'Cập nhập thành công';
    }

}
