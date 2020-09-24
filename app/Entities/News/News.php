<?php

namespace App\Entities\News;

use App\Ultis\File;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class News.
 *
 * @package namespace App\Entities\News;
 */
class News extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','preview','detail','thumbnail', 'user_id'
    ];

    public function creator() {
        return $this->belongsTo('App\Entities\Users\Users','user_id');
    }

    public function getImg(){
        $src = $this->thumbnail;

        return File::getFile($src);
    }

}
