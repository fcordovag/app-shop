<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //relaciones entre modelos, se creanmetodos dentro
    //$category->products
    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
