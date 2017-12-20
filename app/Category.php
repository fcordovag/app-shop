<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Category extends Model
{
	public static $messages = [
    		'name.required'        => 'Es necesario ingresar un nombre',
    		'name.min'             => 'El nombre de la categoria debe tener al menos 3 caracteres',
    		'description.max'      => 'Maximo 200 caracteres'
    	];
	public static $rules = [
		'name'       => 'required|min:3'
	];
    //relaciones entre modelos, se creanmetodos dentro
    //$category->products
    protected $fillable = [
    	'name', 'description'
    ]; //estos son los campos que se pueden llenar en una peticion, se utiliza en el metodo store all() carga masiva
    public function products()
    {
    	return $this->hasMany(Product::class);
    }
    public function getFeaturedImageUrlAttribute()
    {
    	$featuredProduct = $this->products()->first();
    	return $featuredProduct->featured_image_url;
    }
}
