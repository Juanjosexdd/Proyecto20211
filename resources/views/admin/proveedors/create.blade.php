@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO PROVEEDOR')


@section('content_header')
    <h1 class="text-blue">CREAR NUEVO PROVEEDOR</h1>
@stop

@section('content')
    <div class="container">

        <div class="card card-custom bg-white border-white border-0 elevation-5">
            <div class="card-custom-img"
                style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);">
            </div>
            <div class="card-custom-avatar">
               <!-- <img class="img-fluid"
                    src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg"
                    alt="Avatar" /> -->
            </div>
            <div class="card-body" style="overflow-y: auto">
                {!! Form::open(['route' => 'admin.proveedors.store']) !!}

                    @include('admin.proveedors.partials.form')
                    {!! Form::submit('Guardar proveedor', ['class' => 'btn btn-outline-primary btn-block']) !!}
                {!! Form::close() !!}

            </div>
            <div class="card-footer" style="background: inherit; border-color: inherit;">

            </div>
        </div>
        <!-- Copy until here -->

    </div>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('vendor/cards.css')}}">
@stop




