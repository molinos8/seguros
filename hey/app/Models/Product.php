<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class Product extends Model
{

    /**
     * Table name related with the model
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * List of fields that can be filled on the model by the aplication
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
    ];

    /**
     * Get the supplier related with this product.
     * 
     * @return Suppliers colletction 
     */
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class,'product_suppliers');
    }
    
}
