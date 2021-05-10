<div>
    <div class="card uppercase" bis_skin_checked="1">
        <div class="card-header" style="padding: .75rem .25rem" bis_skin_checked="1">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input wire:model="search" type="email" class="form-control mr-2" placeholder="Buscar">
                <a href="{{route('admin.proveedors.create')}}" class="btn bg-navy btn-sm px-2 elevation-4"><i class="fas fa-plus mt-2 px-3"></i></a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0" bis_skin_checked="1">
        @if ($proveedors->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" role="button" wire:click="order('id')">
                            ID
                            @if ($sort == 'id')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                            
                        </th>
                        <th scope="col" role="button" wire:click="order('cedularif')">
                            Identificacion
                            @if ($sort == 'cedularif')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-numeric-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-numeric-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" role="button" wire:click="order('nombres')">
                            Nombres
                            @if ($sort == 'nombres')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" role="button" wire:click="order('email')">
                            Correo
                            @if ($sort == 'email')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedors as $proveedor)
                        <tr>
                            <td><a href="" data-toggle="modal" data-target="#modal-default">{{$proveedor->id}}</a></td>
                            <td><a href="" data-toggle="modal" data-target="#modal-default">{{$proveedor->tipodocumento->abreviado}}-{{$proveedor->cedularif}}</a> </td>
                            <td><a href="" data-toggle="modal" data-target="#modal-default">{{$proveedor->nombre}}</a></td>
                            <td><a href="" data-toggle="modal" data-target="#modal-default">{{$proveedor->correo}}</a></td>
                            <td width="4px"> 
                                @if ($proveedor->estatus == 1)
                                    <form class="formulario-estatus" action="{{route('admin.proveedors.show', $proveedor)}}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success btn-sm elevation-4"><i class="fas fa-user-check"></i></button>
                                    </form>
                                @else
                                <form class="formulario-estatus" action="{{route('admin.proveedors.show', $proveedor)}}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm elevation-4"><i class="fas fa-user-times"></i></button>
                                </form>
                                @endif
                            </td>
                            <td width="8px">
                                <a class="btn btn-outline-info btn-sm mr-1 elevation-4" href=" {{route('admin.proveedors.edit',$proveedor)}} "><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="8px">
                                <form class="formulario-eliminar" action="{{route('admin.proveedors.destroy', $proveedor)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger btn-sm elevation-4"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="py-2 px-4 float-right ">
                {{ $proveedors->links() }}
            </span>
        @else
            <div class="px-6 py-4 text-center text-sm">
                No existe ninguna coincidencia
            </div>
        @endif
        </div>
        <!-- /.card-body -->
    </div>

    {{-- <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Informacion de {{$proveedor->nombre}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <tr>
                    <p> <strong>Documento: </strong> {{$proveedor->tipodocumento->abreviado}}-{{$proveedor->cedula}}</p>
                    <p> <strong>Nombre : </strong> {{$proveedor->nombres}} {{$proveedor->apellidos}}</p>
                    <p> <strong>Correo : </strong> {{$proveedor->email}}</p>
                    <p> <strong>Dirección : </strong> {{$proveedor->direccion}}</p>
                    <p> <strong>Celular : </strong> {{$proveedor->celular}}</p>
                    <p> <strong>Telefono : </strong> {{$proveedor->telefono}}</p>
                    <p> <strong>Cargo:  </strong> {{$proveedor->cargo->nombre}}</p>
                    <p> <strong>Departamento:  </strong> {{$proveedor->departamento->nombre}}</p>
                    <p> <strong>Fecha de registro:  </strong> {{$proveedor->created_at->diffForHumans()}}</p>
                    <p> <strong>Observación :  </strong> {{$proveedor->observacion}}</p>
                </tr>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
    </div> --}}
    
</div>
@section('css')
<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/cards.css') }}">

@stop

@section('js')
<script src="{{asset('vendor/sweetalert2.js')}}  "></script>
<script src=" {{asset('vendor/sweetalert-eliminar.js')}} "></script>
<script src=" {{asset('vendor/sweetalert-estatus.js')}} "></script>


@stop