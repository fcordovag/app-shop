@extends('layouts.app')

@section ('title', 'Bienvenido a APP-SHOP')

@section('body-class', 'products-page')
  
@section('content')
  <div class="wrapper">
        <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
        
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section">
                    <h2 class="title  text-center">Editar categoria Seleccionado</h2>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ URL('/admin/categories/'.$category->id.'/edit') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre de la categoria</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Descripcion de la categoria</label>
                                <input type="text" class="form-control" name="description" value="{{ old('description', $category->description) }}">
                            </div>
                        </div> 
                        <div class="text-center">
                            <button class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ url('/admin/categories') }}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('includes.footer')
    </div>
@endsection

