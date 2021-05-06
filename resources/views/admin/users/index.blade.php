@extends('adminlte::page')

@section('title', 'Inicio Enasa')

@section('content_header')
    <h1>Listado de Usuarios</h1>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/datatable/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/datatable/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/datatable/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css    ">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.csss">
    
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
            top: 61px;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-top-width: 40px;
            border-right-width: 0;
            border-bottom-width: 0;
            border-left-width: 45px;
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
@section('content')
@include('sweetalert::alert')

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
            <table class="table table-striped dt-responsive nowrap" id="usuarios">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Cedula</th>
                        <th>Correo</th>
                        <th>Estatus</th>
                        <th>Cargo</th>
                        <th>Departamento</th>
                        <th>Registro</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->tipodocumento->abreviado}}-{{$user->cedula}} </td>
                            <td>{{$user->name}} {{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->estatus}}</td>
                            <td>{{$user->cargo->nombre}}</td>
                            <td>{{$user->departamento->nombre}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer" style="background: inherit; border-color: inherit;">

        </div>
    </div>
    <!-- Copy until here -->

</div>
@stop

@section('js')
    <script src="{{asset('vendor/sweetalert2.js')}}"></script>
    <script src="{{asset('vendor/datatable/js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('vendor/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatable/js/dataTables-bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendor/datatable/js/dataTables-responsive.min.js')}}"></script>
    <script src="{{asset('vendor/datatable/js/responsive-bootstrap4.min.js')}}"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js|https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    


    



    <script>
        $(document).ready(function() {
            $('#usuarios').DataTable( {
                responsive: true,
                autoWidth: false,
            });
        } );
    </script>
@stop

