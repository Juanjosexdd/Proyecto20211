@extends('adminlte::page')

@section('title', 'ENASA | USUARIOS')

@section('content_header')
    <h1 class="text-blue">LISTA DE USUARIOS</h1>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/datatable/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/datatable/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/datatable/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css    ">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.csss">
<link rel="stylesheet" href=" {{asset('vendor/cards.css')}} ">
    
@stop
@section('content')
@include('sweetalert::alert')

<div class="container">
    <div class="card card-custom bg-white border-white border-0 elevation-5">
        <div class="card-custom-img">
            <img src=" {{asset('storage/header.png')}} " class="img-fluid" alt="">
            <a href="{{route('admin.users.create')}}" class="btn bg-navy float-right mt-2 mb-4 btn-sm px-2 mr-3 elevation-4"><i class="fas fa-plus mt-2 px-3"></i></a>
        </div>
        <div class="card-custom-avatar">
            
        </div>

        <div class="card-body mt-5" style="overflow-y: auto">
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
    <script src=" {{asset('vendor/sweetalert-eliminar.js')}} "></script>

    


    



    <script>
        $(document).ready(function() {
            $('#usuarios').DataTable( {
                responsive: true,
                autoWidth: false,
            });
        } );
    </script>
@stop

