@extends('adminlte::page')

@section('title', 'Editar nuevo tipo documento')


@section('content_header')
    <h1>Editar nuevo tipo documento</h1>
@stop

@section('content')
    @include('sweetalert::alert')
    
    <div class="container">

        <div class="card card-custom bg-white border-white border-0 elevation-5">
            <div class="card-custom-img"
                style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);">
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
    <style>
        .card-custom {
            overflow: hidden;
            min-height: 50px;
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
            top: 31px;
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
@stop


