<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{

    /**
     * Table name related with the model
     *
     * @var string
     */
    protected $table = 'products_category';

    /**
     * List of fields that can be filled on the model by the aplication
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'category_product_id'
    ];


}
