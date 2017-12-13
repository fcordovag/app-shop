@extends('layouts.app')

@SECTION ('title', 'APP-SHOP | Dashboard')

@section('body-class', 'products-page')
  
@section('content')
  <div class="wrapper">
        <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">    
        </div>
        <div class="main main-raised">
            <div class="container">
                <div class="section">
                    <h2 class="title text-center">Dashboard</h2>

                    @if (session('notification'))
                        <div class="alert alert-danger text-center">
                            {{ session('notification') }}
                        </div>
                    @endif 
                     @if (session('notificationC'))
                        <div class="alert alert-success text-center">
                            {{ session('notificationC') }}
                        </div>
                    @endif 
                    <ul class="nav nav-pills nav-pills-primary" role="tablist">
                        <li class="active">
                            <a href="#dashboard" role="tab" data-toggle="tab">
                                <i class="material-icons">dashboard</i>
                                Carrito de compras
                            </a>
                        </li>
                        <li>
                            <a href="#tasks" role="tab" data-toggle="tab">
                                <i class="material-icons">list</i>
                                Pedidos Realizados
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <p class="text-center">Tu carrito de compra presenta {{ auth()->user()->cart->details->count() }} Productos</p>
                    <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center">Subtotal</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (auth()->user()->cart->details as $detail)
                        <tr>
                            <td class="text-center">
                                <img src="{{ $detail->product->featured_image_url }}" alt=""height="50"></td>
                            <td>
                                <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">
                                </a>{{ $detail->product->name }}
                            </td>
                            <td class="text-center">{{ $detail->product->price }}</td>
                            <td class="text-center">{{ $detail->quantity }}</td>
                            <td class="text-center">${{ $detail->quantity*$detail->product->price }}</td>
                            <td class="td-actions text-center">
                            
                            <form action="{{ url('/cart') }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                                <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" type="button" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs"><i class="fa fa-info"></i>
                                </a>
                                <button type="submit" rel="tooltip" title="Eliminar Producto" class="btn btn-danger btn-simple btn-xs"><i class="fa fa-times"></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                        @endforeach   
                    </tbody>
                </table> 
                <div class="text-center">
                    <form action="{{ url('/order') }}" method="post">
                        {{ csrf_field() }}

                        <button class="btn btn-primary btn-round">
                            <i class="material-icons">done</i> Realizar Pedido
                        </button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        @include('includes.footer')
 </div>
@endsection

<!--root_mysql_pass="bdddf2e5989be5313d47e6c49a19030fb7a14777e01d469f"-->