@extends('layouts.app')

@SECTION ('title', 'Resultados de la busqueda')

@section('body-class', 'profile-page')

@section('styles')
<style>
    .team{
        padding-top: 50px;
    }  
   .team .row .col-md-4 {
        margin-bottom: 5em;
    }
    .row {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
    }
    .row > [class*-'col-'] {
        display: flex;
        flex-direction: column;
    }
</style>
@endsection

@section('content')

<div class="wrapper">
        <div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

        <div class="main main-raised">
            <div class="profile-content">
                <div class="container">
                    <div class="row">
                        <div class="profile">
                            <div class="avatar">
                                <img src="img/lup.png" alt="Resultado de la busqueda" class="img-circle img-responsive img-raised">
                            </div>
                            <div class="name">
                                <h3 class="title">Resultados de la busqueda</h3>
                            
                            </div>

                            @if (session('notification'))
                                <div class="alert alert-success text-center">
                                    {{ session('notification') }}
                                </div>
                            @endif 
                            <idv class="description text-center">
                                <p>Se encontraron {{ $products->count() }} resultados de {{ $query }}</p>
                            </idv>
                        <div class="team text-center">
                            <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-4">
                                    <div class="team-player">
                                        <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised img-circle">
                                        <h4 class="title">
                                            <a href="{{ url('/products/'.$product->id)  }}">{{ $product->name }} </a>
                                            <br />
                                        </h4>
                                        <p class="description">{{ $product->description  }}</p> 
                                    </div>
                                </div>
                             @endforeach  
                            </div>
                            <div class="text-center">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
 
<!-- Modal Core -->

@include('includes.footer')
 
@endsection

