<?php

namespace App\Repositories\Slides;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Slides\SlidesRepository;
use App\Entities\Slides\Slides;
use App\Validators\Slides\SlidesValidator;

/**
 * Class SlidesRepositoryEloquent.
 *
 * @package namespace App\Repositories\Slides;
 */
class SlidesRepositoryEloquent extends BaseRepository implements SlidesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Slides::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getSlides() {
        return $this->model->with('creator')->get();
    }

    public function createSlide($data)
    {
        $data['user_id'] = Auth::id();
        $data['thumbnail'] = $this->handleThumbnail($data['thumbnail'], 'public/slides_thumbnail');
        $create = $this->insert($data);
        return 'Thêm thành công';
    }

    public function deleteSlide($id) {
        $object = Slides::find($id)->first();
        Storage::delete('public/slides_thumbnail/'.$object->thumbnail);
        $object->delete();
        return 'Xóa thành công';
    }

    public function handleThumbnail($thumbnail, $path) {

        $arrPath = $thumbnail->store($path);
        $file = explode('/', $arrPath);

        return end($file);
    }

    public function updateSlide($data, $id) {
        if ( isset($data['thumbnail']) ) {
            $data['thumbnail'] = $this->handleThumbnail($data['thumbnail'], 'public/slides_thumbnail');
            $slide = Slides::find($id);
            Storage::delete('public/slides_thumbnail/'.$slide->thumbnail);
        }
        $updated = $this->update($data, $id);

        return 'Cập nhập thành công';
    }

}
