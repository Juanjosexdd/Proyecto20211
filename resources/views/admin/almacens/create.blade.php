@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO ALMACEN')


@section('content_header')
    <h1 class="text-blue">CREAR NUEVO ALMACEN</h1>
@stop

@section('content')
    <div class="container">

        <div class="card card-custom bg-white border-white border-0 elevation-5">
            <div class="card-custom-img">
                <img src=" {{asset('storage/header.png')}} " class="img-fluid" alt="">
            </div>
            <div class="card-custom-avatar">
                
            </div>

            <div class="card-body" style="overflow-y: auto">
                {!! Form::open(['route' => 'admin.almacens.store']) !!}
                    @include('admin.almacens.partials.form')
                    {!! Form::submit('Guardar almacen', ['class' => 'btn btn-outline-primary btn-block']) !!}
                {!! Form::close() !!}
            </div>
            <div class="card-footer" style="background: inherit; border-color: inherit;">

            </div>
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('vendor/cards.css')}}">
@stop

@section('js')
    <script src="{{asset('vendor/sweetalert2.js')}}  "></script>
    <script src="{{asset('vendor/sweetalert-eliminar.js')}} "></script>
    <script src="{{asset('vendor/sweetalert-estatus.js')}} "></script>
@stop


