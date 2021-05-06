@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO MUNICIPIO')


@section('content_header')
    <h1 class="text-blue">CREAR NUEVO MUNICIPIO</h1>
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
                {!! Form::open(['route' => 'admin.ciudads.store']) !!}

                @include('admin.ciudads.partials.form')
                {!! Form::submit('Guardar ciudad', ['class' => 'btn btn-outline-primary btn-block']) !!}
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




