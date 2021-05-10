<div>
    <div class="card uppercase" bis_skin_checked="1">
        <div class="card-header" style="padding: .75rem .25rem" bis_skin_checked="1">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input wire:model="search" type="email" class="form-control mr-2" placeholder="Buscar">
                <a href="{{route('admin.productos.create')}}" class="btn bg-navy btn-sm px-2 elevation-4"><i class="fas fa-plus mt-2 px-3"></i></a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0" bis_skin_checked="1">
        @if ($productos->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" role="button" wire:click="order('id')">
                            Codigo
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
                        <th scope="col" role="button" wire:click="order('nombre')">
                            Nombre
                            @if ($sort == 'nombre')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" role="button" wire:click="order('descripcion')">
                            Descripción
                            @if ($sort == 'descripcion')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{$producto->clacificacions[0]->abreviado}}-{{$producto->id}}</td>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->descripcion}}</td>
                            <td width="4px"> 
                                @if ($producto->estatus == 1)
                                    <form class="formulario-estatus" action="{{route('admin.productos.show', $producto)}}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success btn-sm elevation-4"><i class="fas fa-user-check"></i></button>
                                    </form>
                                @else
                                <form class="formulario-estatus" action="{{route('admin.productos.show', $producto)}}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm elevation-4"><i class="fas fa-user-times"></i></button>
                                </form>
                                @endif
                            </td>
                            <td width="4px">
                                <a class="btn btn-outline-info btn-sm mr-1 elevation-4" href=" {{route('admin.productos.edit',$producto)}} "><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="4px">
                                <form class="formulario-eliminar" action="{{route('admin.productos.destroy', $producto)}}" method="POST">
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
                {{ $productos->links() }}
            </span>
        @else
            <div class="px-6 py-4 text-center text-sm">
                No existe ninguna coincidencia
            </div>
        @endif
        </div>
        <!-- /.card-body -->
    </div>


    
</div>
@section('css')
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('vendor/cards.css')}} "> 
@stop

@section('js')
    <script src="{{asset('vendor/sweetalert2.js')}}  "></script>
    <script src=" {{asset('vendor/sweetalert-eliminar.js')}} "></script>
    <script src=" {{asset('vendor/sweetalert-estatus.js')}} "></script>
@stop