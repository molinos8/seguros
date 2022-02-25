<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsOrder extends Model
{

    /**
     * Table name related with the model
     *
     * @var string
     */
    protected $table = 'products_order';

    /**
     * List of fields that can be filled on the model by the aplication
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id'
    ];


}
