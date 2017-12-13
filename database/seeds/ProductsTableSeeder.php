<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //model factories
        /*
        factory(Category::class, 5)->create(); //crea 5 categoryas
        factory(Product::class, 100)->create(); //crea 100 productos
        factory(ProductImage::class, 200)->create(); //crea 200 imagenes
        */
        $categories = factory(Category::class, 4)->create();
        $categories->each(function ($c){
            $products = factory(Product::class, 5)->make();
            $c->products()->saveMany($products);
            
            $products->each(function ($p){
                $images = factory(ProductImage::class, 3)->make();
                $p->images()->saveMany($images);
            });
        });

       /* $users = factory(App\User::class, 3)
           ->create()
           ->each(function ($u) {
                $u->posts()->save(factory(App\Post::class)->make());
            });
            */
    }
}
