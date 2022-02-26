<?php
namespace App\BMRepositories;

use App\BMRepositories\Interfaces\IRepository;
use App\Models\Product;
use App\Models\ProductCategory;
use Carbon\Carbon;

class ProductRepository implements IRepository {

    /**
     * Return the main id of the product model
     *
     * @return int
     */
    public function getId():int
    {
        return $this->entityId;
    }

    /**
     * Function to persist one product
     *
     * @param array $data
     *
     * @return Product $productId
     */
    public function persistOneProduct(array $data):Product
    {
        $productData = [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'price' => $data['price']
        ];
        $productDB = new Product();
        $prodcutId = $productDB::create($productData);
        return $prodcutId;
    }

    /**
     * Function to persist one product category
     *
     * @param array $data
     *
     * @return ProductCategory $productCategoryId
     */
    public function persistOneProductCategory(array $data):ProductCategory
    {
        $productCategoryData = [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'description' => $data['description']
        ];
        $productCategoryDB = new ProductCategory();
        $productCategoryId = $productCategoryDB::create($productCategoryData);
        return $productCategoryId;
    }

    /**
     * Function to persist one product with its related categories
     *
     * @param array $data
     *
     * @return ProductCategory $productCategoryId
     */
    public function createProductWithItsCategories(array $data):ProductCategory
    {
        $persistedProduct = $this->persistOneProduct($data);
        foreach ($data['categories'] as $category) {
            $productCategoryDB = new ProductCategory();
            $productCategoryDB::create(['product_id' => $persistedProduct->id,'category_product_id' => $category]);
        }
        return $persistedProduct;
    }
}