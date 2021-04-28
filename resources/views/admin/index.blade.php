@extends('adminlte::page')

@section('title', 'Inicio Enasa')

@section('content_header')
    <h1>Bienvenido a Enasa</h1>
@stop

@section('content')
    <div class="container">

        <div class="card card-custom bg-white border-white border-0 elevation-5">
            <div class="card-custom-img"
                style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);">
            </div>
            <div class="card-custom-avatar">
                <img class="img-fluid"
                    src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg"
                    alt="Avatar" />
            </div>
            <div class="card-body" style="overflow-y: auto">
                {{-- Minimal --}}
                <form action="">
                    <div class="col-4">
                    <label class="text-blue">Correo eléctronico</label>
                    <div class="input-group mb-3">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope text-blue"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="Email">
                      </div>
                    </div>
                </form>
            </div>
            <div class="card-footer" style="background: inherit; border-color: inherit;">
                <a href="#" class="btn btn-primary">Option</a>
                <a href="#" class="btn btn-outline-primary">Other option</a>
            </div>
        </div>
        <!-- Copy until here -->

    </div>
    </div>
    {!! Form::close() !!}
@stop

@section('css')
    <style>
        .card-custom {
            overflow: hidden;
            min-height: 450px;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
        }

        .card-custom-img {
            height: 50px;
            min-height: 10px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-color: inherit;
        }

        /* First border-left-width setting is a fallback */
        .card-custom-img::after {
            position: absolute;
            content: '';
            top: 161px;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-top-width: 40px;
            border-right-width: 0;
            border-bottom-width: 0;
            border-left-width: 545px;
            border-left-width: calc(575px - 5vw);
            border-top-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            border-left-color: inherit;
        }

        .card-custom-avatar img {
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
            position: absolute;
            top: 10px;
            left: 1.25rem;
            width: 50px;
            height: 50px;
        }

    </style>
@stop

@section('js')
    <script>
        console.log('Hi!');

    </script>
@stop
