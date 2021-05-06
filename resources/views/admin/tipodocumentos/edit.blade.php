@extends('adminlte::page')

@section('title', 'ENASA | EDITAR DOCUMENTO')


@section('content_header')
    <h1 class="text-blue">EDITAR DOCUMENTO</h1>
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
            {!! Form::model($tipodocumento ,['route' => ['admin.tipodocumentos.update', $tipodocumento],'method' => 'PUT', 'autocomplete' => 'off']) !!}
                @include('admin.tipodocumentos.partials.form')
                {!! Form::submit('Guardar tipo documento', ['class' => 'btn btn-outline-primary btn-block']) !!}

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
@stop


