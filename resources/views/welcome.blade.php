@extends('layouts.app')

@section ('title', 'Bienvenido a APP-SHOP')

@section('body-class', 'landing-page')

@section('styles')
<style>
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
        <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450')">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="title">Bienvenido a App-Shop.</h1>
                        <h4>Reliza pedidos en linea y te contectaremos para coordina una entrega mas rapida.</h4>
                        <br />
                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                            <i class="fa fa-play"></i>¿ Como funciona ?
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section text-center section-landing">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="title">¿ Por qué App-Shop ?</h2>
                            <h5 class="description">Puedes revisar nuestra relacion competa de productos, comparar precios y realizar tus pedidios cuando te sientas seguro de tu compra o del producto que estas adquiriendo.</h5>
                        </div>
                    </div>

                    <div class="features">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-primary">
                                        <i class="material-icons">chat</i>
                                    </div>
                                    <h4 class="info-title">Atendemos tus duas</h4>
                                    <p>Contactanos para poder asistirte de buena manera e tu compra o para dejarnos algun comentario que consideres relevante.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-success">
                                        <i class="material-icons">verified_user</i>
                                    </div>
                                    <h4 class="info-title">Pago Seguro</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">fingerprint</i>
                                    </div>
                                    <h4 class="info-title">Informacion Privada</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section text-center">
                    <h2 class="title">Visita nuestra categorias</h2>
                    <form action="{{ url('/search') }}" method="get" class="form-inline">
                        <input type="text" placeholder="que producto buscas ?" class="form-control" name="query" id="search">
                        <button class="btn btn-primary btn-round" type="submit">
                            <i class="material-icons">search</i>
                        </button>
                    </form>
                    <div class="team">
                        <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-md-4">
                                <div class="team-player">
                                    <img src="{{ $category->featured_image_url }}" alt="Imagen representati de la categoria {{ $category->name }}" class="img-raised img-circle">
                                    <h4 class="title">
                                        <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }} </a>
                                        <br />
                                        <small class="text-muted">{{ $category->category_name }}</small>
                                    </h4>
                                    <p class="description">{{ $category->description  }}</p> 
                                </div>
                            </div>
                         @endforeach  
                        </div>
                    
                    </div>
                </div>
                <div class="section landing-section">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center title">Dejanos un mensaje</h2>
                            <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                            <form class="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Correo electronico</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group label-floating">
                                    <label class="control-label">Escribe tu mensaje</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4 text-center">
                                        <button class="btn btn-primary btn-raised">
                                            Enviar Mensaje
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        @include('includes.footer')

    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
    <script>
        $(function ()
        {
            //
        var products = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
          // `states` is an array of state names defined in "The Basics"
          prefetch: '{{ url("/products/json") }}'
        });
            //inicializamos typehead sobre nuestro inpurt de busqueda
        $('#search').typeahead({
          hint: true,
          highlight: true,
          minLength: 1
        },
        {
          name: 'products',
          source: products
        });
        })
    </script>
@endsection