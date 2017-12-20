<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('name')->paginate(5);
    	return view('admin.categories.index')->with(compact('categories')); //listado
    }
    public function create()
    {
    	return view('admin.categories.create');// formulario de registro
    }
    public function store(Request $request)
    {
    	//validar datos
    	
    	$this->validate($request, Category::$rules, Category::$messages);

		Category::create($request->all()); //asignacion masiva o mass assigment


    	return redirect('admin/categories');
    }
    public function edit(Category $category)
    {
    	//$category = Category::find($id);
    	return view('admin.categories.edit')->with(compact('category'));// formulario de editar
    }
    public function update(Request $request, Category $category)
    {
    	//validar datos
    	
    	$this->validate($request, Category::$rules, Category::$messages);
    	//dd($request->all()); //dd permite imprimir ty finalizar la respuesta del servido
    	$category->update($request->all());


    	return redirect('admin/categories');
    }
    public function destroy(Category $category)
    {
    	$category->delete(); //DELETE
    	return back();
    }

}
