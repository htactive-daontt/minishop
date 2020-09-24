<?php

namespace App\Repositories\News;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\News\NewsRepository;
use App\Entities\News\News;
use App\Ultis\File;
use App\Validators\News\NewsValidator;

/**
 * Class NewsRepositoryEloquent.
 *
 * @package namespace App\Repositories\News;
 */
class NewsRepositoryEloquent extends BaseRepository implements NewsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return News::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getNews() {
        return $this->model->with('creator')->get();
    }

    public function createNews($data) {
        $arrCreate = [
            'title' => $data['namenew'],
            'preview' => $data['namenew'],
            'detail'    => $data['detailnew'],
            'thumbnail' => File::upload($data['pic'],'news_thumbnail') 
        ];

        $this->insert($arrCreate);

        return 'Thêm thành công';
    }


    public function updateNew($data, $id) {
        $object = News::find($id);
        $image = $object->thumbnail;
        if(isset($data['thumbnail'])) {
            if(empty($object->thumbnail))
            {
                $isDelteThumbnail = File::delete($object->thumbnail);
                if($isDelteThumbnail) {
                    $image = File::upload($data['thumbnail'],'news_thumbnail');
                }
            }
        }
        $data['thumbnail'] = $image;
        $update = $this->update($data, $id);

        return 'Cập nhập thành công';

    }


    public function getNewsHome() {
        return News::inRandomOrder()->limit(2)->get();
    }
}
