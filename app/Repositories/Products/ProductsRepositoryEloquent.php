<?php

namespace App\Repositories\Products;

use App\Criteria\WithCountRelationshipCriteria;
use App\Entities\Categories\Categories;
use App\Ultis\File;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Products\ProductsRepository;
use App\Entities\Products\Products;
use App\Validators\Products\ProductsValidator;
use Illuminate\Support\Str;
use  DB;

/**
 * Class ProductsRepositoryEloquent.
 *
 * @package namespace App\Repositories\Products;
 */
class ProductsRepositoryEloquent extends BaseRepository implements ProductsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Products::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getProducts() {
        $data =  Products::with('category')->withCount('comment')->get();

        return $data;
    }

    public function getCategories() {
        return Categories::all();
    }

    public function createProduct($request) {
        $images = [];

        $thumbnail = File::upload($request['thumbnail'], 'products_thumbnail');

        if ( isset($request['images']) ) {
            foreach ($request['images'] as $key => $value)
            {
                $images[$key] = File::upload($value, 'products_images');
            }
        }
        $arrProduct = [
            'name' => $request['nameproduct'],
            'slug'  => Str::slug($request['nameproduct']),
            'qty'   => $request['qty'],
            'price' =>  $request['price'],
            'sale'  => $request['sale'],
            'preview'    =>  $request['preview'],
            'detail'    =>  $request['detail'],
            'thumbnail' =>  $thumbnail,
            'images'    =>  $images,
            'category_id'   =>  $request['idcat']
        ];
        //dd($arrProduct);
        $create = $this->model->create($arrProduct);
        if ($create) {
            return 'Thêm thành công';
        }else {
            return 'Có lỗi xảy ra';
        }
    }


    public function destroyProduct($id) {
        $object = Products::find($id);
        File::delete($object->thumbnail);
        if (empty($object->images)) {
            foreach ($object->images as $key => $value) {
                File::delete($value);
            }
        }
        $object->delete();
        return 'Xóa thành công';
    }

    public function getProductById($id)
    {
        return Products::where('id', $id)
                        ->with(['category','comment.user'])
                        ->withCount('comment')
                        ->first();
    }

    public function updateProduct($id, $data) {
        $object = Products::find($id);

        $thumbnail = $object->thumbnail;
        $images = $object->images;
        
        if (isset($data['thumbnail'])) {
            $destroyFile = File::delete($object->thumbnail);
            if($destroyFile) {
                $thumbnail = File::upload($data['thumbnail'],'products_thumbnail');
            }        
        }
        if (isset($data['images'])) {
            if(!empty($object->images)) {
                foreach($object->images as $valueDe) {
                    File::delete($valueDe);
                    $images = [];
                }
            }

            foreach($data['images'] as $key => $value) {
                $images[$key] = File::upload($value, 'products_images');
            }
            //dd($data['images']);
        }


        $update = [
            'name'  => $data['nameproduct'],
            'slug'  => Str::slug($data['nameproduct']),
            'qty'  => $data['qty'],
            'sale'  => $data['sale'],
            'price'  => $data['price'],
            'preview'  => $data['preview'],
            'detail'  => $data['detail'],
            'thumbnail'  => $thumbnail,
            'images'  => $images,
            'category_id'  => $data['idcat'],
        ];

        Products::find($id)->update($update);

        return 'Cập nhập thành công';
    }

    public function getProductsOfCategories($id) {
        return Categories::where('id', $id)->with('products')->first();
    }

    public function getProductHome()
    {
        return $this->model->paginate(8);
    }

    public function getProductsRelate($id, $category_id) {
        return Products::where('id', '!=', $id)
                    ->where('category_id', $category_id)
                    ->with('category')
                    ->get();
    }

    public function getProductsNew() {
        return Products::with('category')
                        ->orderBy('id', 'DESC')
                        ->get();
    }

    public function getProductsSale() {
        return Products::with('category')
                        ->where('sale', '>', 0)
                        ->orderBy('sale', 'ASC')
                        ->get();
    }

    public function getProductSeling() {
        return Products::inRandomOrder()->paginate(4);
    }

    public function search($keyword) {
        return $this->model->where('name','LIKE', '%'.$keyword.'%')->get();
    }
}
