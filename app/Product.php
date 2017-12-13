<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   // $product->category
   public function category()
   {
   		return $this->belongsTo(Category::class);
   } 
   public function images()
   {
   		return $this->hasMany(ProductImage::class);
   }
   //accesor
   function getFeaturedImageUrlAttribute()
   {
   		$featuredImage = $this->images()->where('featured', true)->first();
   		if (!$featuredImage) 
   		{
   			$featuredImage = $this->images()->first();
   		}
   		if ($featuredImage) 
   		{
   			return $featuredImage->url;
   		}
   		//devolver imagen por defecto
   		return '/images/products/noImage.png';
   }
}
