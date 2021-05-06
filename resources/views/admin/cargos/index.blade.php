@extends('adminlte::page')

@section('title', 'ENASA | CARGOS')

@section('content_header')
    <h1 class="text-blue">LISTA DE CARGOS</h1>
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
        <div class="card-custom-img">
            <img src=" {{asset('storage/header.png')}} " class="img-fluid" alt="">
        </div>
        <div class="card-custom-avatar">
            
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

