<?php

namespace App\Repositories\Products;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductsRepository.
 *
 * @package namespace App\Repositories\Products;
 */
interface ProductsRepository extends RepositoryInterface
{
    public function getProducts();

    public function getCategories();

    public function createProduct($request);

    public function destroyProduct($id);

    public function getProductById($id);

    public function updateProduct($id, $data);

    public function getProductsOfCategories($id);

    public function getProductsRelate($id, $category_id);

    public function getProductsNew();
    public function getProductsSale();
    public function getProductSeling();

    public function search($keyword);
}
