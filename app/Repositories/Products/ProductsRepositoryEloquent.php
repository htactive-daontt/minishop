<?php

namespace App\Repositories\Products;

use App\Entities\Categories\Categories;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Products\ProductsRepository;
use App\Entities\Products\Products;
use App\Validators\Products\ProductsValidator;
use Illuminate\Support\Str;

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
        foreach ($data as $key => $value) {
            $data[$key]['images'] = json_decode($value->images);
        }

        return $data;
    }

    public function getCategories() {
        return Categories::all();
    }

    public function createProduct($request) {
        $images = '';
        if ( isset($request['images']) ) {
            $images = $this->handleMutiphilePicture($request['images'], 'public/products_images');
        }
        $arrProduct = [
            'name' => $request['nameproduct'],
            'slug'  => Str::slug($request['nameproduct']),
            'qty'   => $request['qty'],
            'price' =>  $request['price'],
            'sale'  => $request['sale'],
            'preview'    =>  $request['preview'],
            'detail'    =>  $request['detail'],
            'thumbnail' =>  $this->handlePicture( $request['thumbnail'], 'public/products_thumbnail'),
            'images'    =>  $images,
            'category_id'   =>  $request['idcat']
        ];
        //dd($arrProduct);
        $create = Products::insert($arrProduct);
        if ($create) {
            return 'Thêm thành công';
        }else {
            return 'Có lỗi xảy ra';
        }
    }

    public function handlePicture($picture, $path) {
        $filePath = $picture->store($path);
        $arFile = explode('/', $filePath);
        $name = end($arFile);
        return $name;
    }
    public function handleMutiphilePicture($pictures, $path) {
        foreach ($pictures as $key => $value) {
            $filePath = $value->store($path);
            $arFile = explode('/', $filePath);

            $data[$key] = end($arFile);
        }
        return json_encode($data);
    }

    public function destroyProduct($id) {
        $object = Products::find($id);
        Storage::delete('products_thumbnail/'.$object->thumbnail);
        if (empty($object->images)) {
            $images = json_decode($object->images);
            foreach ($images as $key => $value) {
                Storage::delete('public/products_images/'.$value);
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
            //Storage::delete('public/products_thumbnail/'.$object->thumbnail);

            $filePath = $data['thumbnail']->store('public/products_thumbnail');
            $arFile = explode('/', $filePath);
            $thumbnail = end($arFile);
        }

        $update = [
            'name'  => $data['nameproduct'],
            'slug'  => Str::slug($data['nameproduct']),
            'qty'  => $data['qty'],
            'price'  => $data['price'],
            'sale'  => $data['sale'],
            'preview'  => $data['preview'],
            'detail'  => $data['detail'],
            'thumbnail'  => $thumbnail,
            'images'  => $images,
            'detail'  => $data['idcat'],
        ];

        $this->update($update, $id);
        return 'Cập nhập thành công';
    }

    public function getProductsOfCategories($id) {
        return Categories::where('id', $id)->with('products')->first();
    }

    public function getProductsRelate($id, $category_id) {
        return Products::where('id', '!=', $id)
                    ->where('category_id', $category_id)
                    ->with('category')
                    ->get();
    }

    public function getProductsHome() {
        return Products::with('category')->paginate(8);
    }
}
