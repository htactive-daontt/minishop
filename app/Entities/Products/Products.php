<?php

namespace App\Entities\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Products.
 *
 * @package namespace App\Entities\Products;
 */
class Products extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','qty','sale','price','preview','detail','thumbnail','images','category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Entities\Categories\Categories','category_id');
    }

    public function comment() {
        return $this->hasMany('App\Entities\Comments\Comments','product_id');
    }

    public function suscess_bill() {
        return  $this->hasMany('App\Entities\BillsDetail\BillsDetail', 'product_id');
    }

    public function checkQty() {
        if ($this->qty <= 0) {
            echo "<span style='color:red'>Hết hàng</span>";
        }else {
            return $this->getPrice();
        }
    }

    public function getPrice() {

        if ($this->sale>0) {
            return number_format($this->price - ($this->price/100*$this->sale)) .' đ';
        }else {
            return number_format($this->price) .' đ';
        }
    }

    public function checkBtnQty() {
        if ($this->qty <=0) {
            return 'disabled';
        }
    }

    public function getImg() {
        $src = $this->thumbnail;

        return asset("storage/products_thumbnail/$src");
        //return Storage::get('products_thumbnail/'.$src);
    }
}
