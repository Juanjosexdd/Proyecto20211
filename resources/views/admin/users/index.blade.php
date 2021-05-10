@extends('adminlte::page')

@section('title', 'ENASA | USUARIOS')

@section('content_header')
    <h1 class="text-blue">LISTA DE USUARIOS</h1>
@stop

@section('css')
    <link rel="stylesheet" href=" {{asset('vendor/cards.css')}} ">
    <link rel="stylesheet" href=" {{asset('vendor/datatable/css/bootstrap.css')}} ">
    <link rel="stylesheet" href=" {{asset('vendor/datatable/css/dataTables.bootstrap4.min.css')}} ">
    <link rel="stylesheet" href=" {{asset('vendor/datatable/css/responsive.bootstrap4.min.css')}} ">
    
@stop
@section('content')
@include('sweetalert::alert')

<div class="container">
    @livewire('show-user')
    {{-- <div class="card card-custom bg-white border-white border-0 elevation-5">
        <div class="card-custom-img">
            <img src=" {{asset('storage/header.png')}} " class="img-fluid" alt="">
            <a href="{{route('admin.users.create')}}" class="btn bg-navy float-right mt-2 mb-4 btn-sm px-2 mr-3 elevation-4"><i class="fas fa-plus mt-2 px-3"></i></a>
        </div>
        <div class="card-custom-avatar">
            
        </div>

        <div class="card-body mt-5" style="overflow-y: auto">
            <table class="table table-striped dt-responsive nowrap" id="datatable">
                <thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Estatus</th>
                        <th>Cargo</th>
                        <th>Departamento</th>
                        <th>Registro</th>
                        <th colspan="2">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                        <tr>
                            <td>{{$user->tipodocumento->abreviado}}-{{$user->cedula}} </td>
                            <td>{{$user->name}} {{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                @if ($user->estatus == 1)
                                    <span class="badge badge-success">Áctivo</span>
                                @else
                                    <span class="badge badge-success">Ináctivo</span>
                                @endif
                            </td>
                            <td>{{$user->cargo->nombre}}</td>
                            <td>{{$user->departamento->nombre}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td width="8px">
                                <a class="btn btn-outline-info btn-sm mr-1 elevation-4" href=" {{route('admin.users.edit',$user)}} "><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="8px">
                                <form action="{{route('admin.users.destroy', $user)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger btn-sm elevation-4"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer" style="background: inherit; border-color: inherit;">

        </div>
    </div> --}}

</div>
@stop

@section('js')
    <script src=" {{asset('vendor/sweetalert-eliminar.js')}} "></script>
    <script src=" {{asset('vendor/datatable/js/jquery-3.5.1.js')}} "></script>
    <script src=" {{asset('vendor/datatable/js/jquery.dataTables.min.js')}} "></script>
    <script src=" {{asset('vendor/datatable/js/dataTables.bootstrap4.min.js')}} "></script>
    <script src=" {{asset('vendor/datatable/js/dataTables.responsive.min.js')}} "></script>
    <script src=" {{asset('vendor/datatable/js/responsive.bootstrap4.min.js')}} "></script>

    <script>
        // $(document).ready(function() {
        //     $('#datatable').DataTable( {
        //         responsive: true,
        //         autoWidth: false,
        //         "language": {
        //             "lengthMenu": "Mostrar _MENU_ registros por paginas",
        //             "zeroRecords": "No existe ninguna coincidencia",
        //             "info": "Mostrando la pagina _PAGE_ de _PAGES_",
        //             "infoEmpty": "No hay registros disponibles",
        //             "infoFiltered": "(filtrado _MAX_ registros totales)",
        //             'search': "Buscar: ",
        //             'paginate': {
        //                 'next': 'Siguiente',
        //                 'previous': 'Anterior'
        //             },

        //         },
                
        //     });
        // } );
    </script>
@stop

