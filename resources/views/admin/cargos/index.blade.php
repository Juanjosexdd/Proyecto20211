@extends('adminlte::page')

@section('title', 'Inicio Enasa')

@section('content_header')
    <h1>Listado de cargos</h1>
@stop

@section('content')
@if (session('info'))
        <div class="alert alert-info alert-dismissible" style="background-color: #001f3f">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>{{session('info')}}   <i class="far fa-thumbs-up"></i> </strong>
        </div>
    @endif
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
            @livewire('show-cargos')
        </div>
        <div class="card-footer" style="background: inherit; border-color: inherit;">

        </div>
    </div>
    <!-- Copy until here -->

</div>
@stop

