<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\productImage;
use File;


class ImageController extends Controller
{
	//el metodo view siempre ara referencia a la carpeta view que esta dentro de resourse
    public function index($id)
    {
        $product = Product::find($id);
        $images = $product->images()->orderBy('featured', 'desc')->get();
     	return view('admin.products.images.index')->with(compact('product', 'images')); //listado
    }


    public function create()
    {
    	return view('admin.products.create');// formulario de registro
    }
    public function store(Request $request, $id)
    {
    	//guardar la imagen el proyecto
        $file = $request->file('photo');
        $path = public_path().'/images/products';
        $fileName = uniqid().$file->getClientOriginalName();
        $moved = $file->move($path, $fileName);

        if ($moved) {
            //crear el registro en la base de datos
            $productImage = new ProductImage();
            $productImage->image = $fileName;
            //$productImage->featured = $fileName;
            $productImage->product_id = $id;
            $productImage->save(); //insert
        }
        return back();
    }
    
    public function destroy(Request $request, $id)
    {
    	//eliminar el archivo
        $productImage = ProductImage::find($request->image_id);

        if (substr($productImage->image, 0, 4) === "http") {
            $delete = true;
        }else{
            $fullPath = public_path().'/images/products/'.$productImage->image;
            $delete = File::delete($fullPath);
        }
        if ($delete) {
            $productImage->delete();    
        }
        return back();
    }
    public function select($id, $image)
    {
        ProductImage::where('product_id', $id)->update([
            'featured' => false
        ]);

        $productImage = ProductImage::find($image);
        $productImage->featured = true;
        $productImage->save();

        return back();
    }
}
