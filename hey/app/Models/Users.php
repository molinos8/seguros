<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    /**
     * Table name related with the model
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * List of fields that can be filled on the model by the aplication
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password'
    ];


}
