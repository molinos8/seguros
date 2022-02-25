<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierContact extends Model
{

    /**
     * Table name related with the model
     *
     * @var string
     */
    protected $table = 'supplier_contact';

    /**
     * List of fields that can be filled on the model by the aplication
     *
     * @var array
     */
    protected $fillable = [
		'name',
		'email',
		'phone',
		'position',
		'supplier_id'
    ];


}
