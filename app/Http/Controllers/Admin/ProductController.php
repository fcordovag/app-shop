<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
	//el metodo view siempre ara referencia a la carpeta view que esta dentro de resourse
    public function index()
    {
    	$products = Product::paginate(5);
    	return view('admin.products.index')->with(compact('products')); //listado
    }
    public function create()
    {
        $categories = Category::orderBy('name')->get();
    	return view('admin.products.create')->with(compact('categories'));// formulario de registro
    }
    public function store(Request $request)
    {
    	//validar datos
    	$messages = [
    		'name.required'        => 'Es necesario ingresar un nombre',
    		'name.min'             => 'El nombre del producto debe tener al menos 3 caracteres',
    		'description.required' => 'Debe ingresar una descripcion',
    		'description.max'      => 'Maximo 200 caracteres',
    		'price.required'       => 'Debe ingresar el precio',
    		'price.numeric'        => 'Ingrese un precio valido',
    		'price.min'            => 'No ingrese valores negativos'
    	];
    	$rules = [
    		'name'       => 'required|min:3',
    		'description'=> 'required|max:200',
    		'price'      => 'required|numeric|min:0'
    	];
    	$this->validate($request, $rules, $messages);

    	//registra nuevo producto en la base de datos
    	//dd($request->all()); //dd permite imprimir ty finalizar la respuesta del servido
    	$product = new Product();
    	$product->name             = $request->input('name');
    	$product->description      = $request->input('description');
    	$product->long_description = $request->input('long_description');
    	$product->price            = $request->input('price');
        $product->category_id       = $request->category_id;
    	$product->save(); //insert sobre la tabla producto

    	return redirect('admin/products');
    }
    public function edit($id)
    {
    	$product = Product::find($id);
        $categories = Category::orderBy('name')->get();
    	return view('admin.products.edit')->with(compact('product','categories'));// formulario de editar
    }
    public function update(Request $request, $id)
    {
    	//validar datos
    	$messages = [
    		'name.required'        => 'Es necesario ingresar un nombre',
    		'name.min'             => 'El nombre del producto debe tener al menos 3 caracteres',
    		'description.required' => 'Debe ingresar una descripcion',
    		'description.max'      => 'Maximo 200 caracteres',
    		'price.required'       => 'Debe ingresar el precio',
    		'price.numeric'        => 'Ingrese un precio valido',
    		'price.min'            => 'No ingrese valores negativos'
    	];
    	$rules = [
    		'name'       => 'required|min:3',
    		'description'=> 'required|max:200',
    		'price'      => 'required|numeric|min:0'
    	];
    	$this->validate($request, $rules, $messages);
    	//dd($request->all()); //dd permite imprimir ty finalizar la respuesta del servido
    	$product = Product::find($id);
    	$product->name             = $request->input('name');
    	$product->description      = $request->input('description');
    	$product->long_description = $request->input('long_description');
    	$product->price            = $request->input('price');
        $product->category_id       = $request->category_id;
    	$product->save(); //update sobre la tabla producto

    	return redirect('admin/products');
    }
    public function destroy($id)
    {
    	//dd($request->all()); //dd permite imprimir ty finalizar la respuesta del servido
    	$product = Product::find($id);
    	$product->delete(); //DELETE

    	return back();
    }

}
