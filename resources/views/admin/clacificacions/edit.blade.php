@extends('adminlte::page')

@section('title', 'ENASA | EDITAR CLACIFICACIÓN')


@section('content_header')
    <h1 class="text-blue">EDITAR CLACIFICACIÓN</h1>
@stop

@section('content')
    @include('sweetalert::alert')
    
    <div class="container">

        <div class="card card-custom bg-white border-white border-0 elevation-5">
            <div class="card-custom-img">
                <img src=" {{asset('storage/header.png')}} " class="img-fluid" alt="">
            </div>
            <div class="card-custom-avatar">
            </div>
            <div class="card-body" style="overflow-y: auto">
            {!! Form::model($clacificacion ,['route' => ['admin.clacificacions.update', $clacificacion],'method' => 'PUT', 'autocomplete' => 'off']) !!}
                @include('admin.clacificacions.partials.form')
                {!! Form::submit('Guardar clacificación', ['class' => 'btn btn-outline-primary btn-block']) !!}

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

@section('js')
    <script src="{{asset('vendor/sweetalert2.js')}}  "></script>
    <script src=" {{asset('vendor/sweetalert-eliminar.js')}} "></script>
    <script src=" {{asset('vendor/sweetalert-estatus.js')}} "></script>
@stop