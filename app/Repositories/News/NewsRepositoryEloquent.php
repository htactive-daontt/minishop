<?php

namespace App\Repositories\News;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\News\NewsRepository;
use App\Entities\News\News;
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
            'thumbnail' => $this->handlePicture($data['pic'],'public/news_thumbnail'),
            'user_id'   => Auth::id()
        ];

        $this->insert($arrCreate);

        return 'Thêm thành công';
    }

    public function handlePicture($picture, $path) {
        $filePath = $picture->store($path);
        $arFile = explode('/', $filePath);
        $name = end($arFile);
        return $name;
    }

    public function updateNew($data, $id) {


        if(isset($data['thumbnail'])) {
            $data['thumbnail'] = $this->handleThumbnail($data['thumbnail'], 'public/news_thumbnail');
            $new = News::find($id);
            //Storage::delete('public/news_thumbnail/'.$new->thumbnail);
        }else {
            $object = News::find($id)->first();
            $data['thumbnail'] = $object->thumbnail;
        }

        $update = $this->update($data, $id);

        return 'Cập nhập thành công';

    }

    public function handleThumbnail($thumbnail, $path) {

        $arrPath = $thumbnail->store($path);
        $file = explode('/', $arrPath);

        return end($file);
    }

    public function getNewsHome() {
        return News::inRandomOrder()->limit(2)->get();
    }
}
