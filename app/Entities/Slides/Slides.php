<?php

namespace App\Entities\Slides;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Slides.
 *
 * @package namespace App\Entities\Slides;
 */
class Slides extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','preview','thumbnail', 'user_id'
    ];

    public function creator() {
        return $this->belongsTo('App\Entities\Users\Users','user_id');
    }

    public function getImg() {
        $src = $this->thumbnail;

        return asset("storage/slides_thumbnail/$src");
    }
}
