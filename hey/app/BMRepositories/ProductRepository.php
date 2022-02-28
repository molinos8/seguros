<?php
namespace App\BMRepositories;

use Illuminate\Database\Eloquent\Collection;
use App\BMRepositories\Interfaces\IRepository;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductCategory;
use App\Models\ProductSupplier;

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
     * @return Product $productCategoryId
     */
    public function createProductWithItsCategories(array $data):Product
    {
        $persistedProduct = $this->persistOneProduct($data);
        foreach ($data['categories'] as $category) {
            $productCategoryDB = new ProductCategory();
            $productCategoryDB::create(['product_id' => $persistedProduct->id,'category_product_id' => $category]);
        }
        return $persistedProduct;
    }

    /**
     * Function to persist one product with its related categories and suppliers
     *
     * @param array $data
     *
     * @return Product $productCategoryId
     */
    public function createProductWithItsCategoriesAndSupplier(array $data):Product
    {
        $persistedProduct = $this->persistOneProduct($data);
        foreach ($data['categories'] as $category) {
            $productCategoryDB = new ProductCategory();
            $productCategoryDB::create(['product_id' => $persistedProduct->id,'category_product_id' => $category]);
        }
        foreach ($data['suppliers'] as $supplier) {
            $productSupplierDB = new ProductSupplier();
            $productSupplierDB::create(['product_id' => $persistedProduct->id,'supplier_id' => $supplier]);
        }
        return $persistedProduct;
    }

    /**
     * Function to get products of one supplier store
     *
     * @param array $data
     *
     * @return Collection products collection
     */
    public function getSupplierProducts(array $data):Collection
    {
        $products = Product::find($data['supplier_id'])->suppliers;

        return $products;
    }

    /**
     * Function to one store best seller product
     *
     * @param array $data
     *
     * @return string $bestSellerSotoreProduct product name
     */
    public function getOneStoreBestSelledProduct(array $data):string
    {
        $bestSellerSotoreProduct = Product::select('product.name')
            ->groupBy('product.name')
            ->join('products_order', 'products_order.product_id', '=', 'product.id')
            ->join('order', 'products_order.order_id', '=', 'order.id')
            ->join('store', 'store.id', '=', 'order.id')
            ->where('store.id', $data['store_id'])
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)
            ->get();
            return $bestSellerSotoreProduct;
    } 
    /**
     * Function to get best seller product
     *
     * @param array $data
     *
     * @return string $bestSellerSotoreProduct product name
     */
    public function getBestSelledProduct():string
    {
        $bestSellerSotoreProduct = Product::select('name')
            ->groupBy('name')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)
            ->get();
            return $bestSellerSotoreProduct;
    } 
}