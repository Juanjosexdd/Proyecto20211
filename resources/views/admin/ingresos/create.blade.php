@extends('adminlte::page')

@section('title', 'ENASA | CREAR NUEVO INGRESO')


@section('content_header')
    <h1 class="text-blue">CREAR NUEVO INGRESO</h1>
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
                {!! Form::open(['route' => 'admin.ingresos.store']) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            {!! Form::label('proveedor_id', 'Proveedor : ', ['class' => 'text-blue']) !!}
                            {!! Form::select('proveedor_id', $proveedors, null, ['class' => 'form-control selectpicker','data-live-search' => 'true']) !!}
                            @error('proveedor_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-md-4">
                        <div>
                            {!! Form::label('tipomovimiento_id', 'Tipo Movimiento : ', ['class' => 'text-blue']) !!}
                            {!! Form::select('tipomovimiento_id', $tipomovimients, null, ['class' => 'form-control selectpicker','data-live-search' => 'true']) !!}
                            @error('tipomovimiento_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-4">
                        <div>
                            {!! Form::label('tipomovimiento_id', 'Tipo Movimiento : ', ['class' => 'text-blue']) !!}
                            {!! Form::select('tipomovimiento_id', $tipomovimients, null, ['class' => 'form-control selectpicker','data-live-search' => 'true']) !!}
                            @error('tipomovimiento_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-md-4">
                        <div>
                            {!! Form::label('user_id', 'Responsable : ', ['class' => 'text-blue']) !!}
                            {!! Form::select('user_id', $users, null, ['class' => 'form-control selectpicker','data-live-search' => 'true']) !!}
                            @error('user_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div>
                            {!! Form::label('palmacen_id', 'Almacen : ', ['class' => 'text-blue']) !!}
                            {!! Form::select('palmacen_id', $almacens, null, ['class' => 'form-control selectpicker','data-live-search' => 'true']) !!}
                            @error('palmacen_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::label('pproducto_id', 'Productos : ', ['class' => 'text-blue']) !!}
                        {!! Form::select('pproducto_id', $productos, null, ['class' => 'form-control selectpicker','data-live-search' => 'true']) !!}
                        @error('pproducto_id')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            {!! Form::label('pcantidad', 'Cantidad ',['class' => 'text-blue ']) !!}
                            <div class="input-group mb-3">
                                {!! Form::number('pcantidad', null, ['class' => 'form-control', 'placeholder' => 'Cantidad']) !!}
                            </div>
                            @error('pcantidad')
                                <small class="text-danger mt-0">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-1">
                        {!! Form::label('&nbsp;&nbsp;', 'Agregar ',['class' => 'text-blue ']) !!}
                        <button type="button" id="bt_add" class="btn btn-primary elevation-4">Add</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table id="detalles" class="table table-striped table-sm table-hover">
                            <thead style="background-color: #339bc0"; class="p-0">
                                <th class="text-white">Opciones</th>
                                <th class="text-white">Producto</th>
                                <th class="text-white">Cantidad</th>
                                <th class="text-white">Almacen</th>
                            </thead>
                            <tfoot>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12" id="guardar">
                        {{-- <input name="_token" value="{{ csrf_token() }}" type="hidden"> --}}
                        {!! Form::submit('Guardar producto', ['class' => 'btn btn-outline-primary btn-block']) !!}
                        {!! Form::reset('Cancelar', ['class' => 'btn btn-outline-danger btn-block']) !!}
                        
                    </div>
                </div>
                    {{-- @include('admin.ingresos.partials.form') --}}
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
<link rel="stylesheet" href="{{asset('vendor/select2/css/bootstrap-select.min.css')}}">
@stop


@section('js')
<script src="{{asset('vendor/select2/js/bootstrap-select.min.js')}}"></script>

<script>

    $(document).ready(function(){
        $('#bt_add').click(function(){
            agregar();
        });
    });

    var cont=0;

    function agregar()
    {
        producto_id=$("#pproducto_id").val();
        cantidad=$("#pcantidad").val();
        almacen_id=$("#palmacen_id").val();

        if (producto_id!="" && cantidad>0 && almacen_id!="")
        {
            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')";>X</button></td><td><input type="hidden" name="producto_id[]" value="'+producto_id+'">'+producto_id+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="hidden" name="almacen_id[]" value="'+almacen_id+'">'+almacen_id+'</td></tr>';
            cont++;
            limpiar();
            $('#detalles').append(fila);
        }else{
            alert("Error al ingresar");
        }
    }

    function limpiar(){
        $("#pcantidad").val("");
    }



</script>
@stop
