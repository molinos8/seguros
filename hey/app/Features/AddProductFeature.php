<?php

namespace App\Features;

use Illuminate\Http\Request;
use Lucid\Units\Feature;

class AddProductFeature extends Feature
{
    public function handle(Request $request)
    {
        print $request->name;
    }
}
