<a href=" {{route('admin.proveedors.index')}} " class="float-right h5 text-blue"><i class="fas fa-reply"></i>   Volver</a>
<p class="h3 text-blue">Información proveedor</p>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre & ',['class' => 'text-blue']) !!}       {!! Form::label('slug', 'slug :',['class' => 'text-blue']) !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', ]) !!}
                {!! Form::hidden('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug' ,'readonly']) !!}
            </div>
            @error('nombre')
                <small class="text-danger mt-0">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
            {!! Form::label('tipodocumento_id', 'N : ',['class' => 'text-blue']) !!}
            {!! Form::select('tipodocumento_id', $tipodocumentos, null, ['class' => 'form-control']) !!}
            @error('tipodocumento_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-blue">Cedula: </label>
            {!! Form::label('cedularif', 'Cedula : ',['class' => 'text-blue']) !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {!! Form::text('cedularif', null, ['class' => 'form-control', 'placeholder' => 'Cedula']) !!}
            </div>
            @error('cedularif')
                <small class="text-danger mt-0">{{$message}}</small>
            @enderror
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('correo', 'Correo eléctronico : ',['class' => 'text-blue']) !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope text-blue"></i></span>
                </div>
                {!! Form::email('correo', null, ['class' => 'form-control', 'placeholder' => 'Correo electronico']) !!}
            </div>
            @error('correo')
                <small class="text-danger mt-0">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('telefono', 'Telefono : ',['class' => 'text-blue']) !!}
            <div class="input-group" bis_skin_checked="1">
                <div class="input-group-prepend" bis_skin_checked="1">
                    <span class="input-group-text"><i class="fas fa-home text-blue"></i></span>
                </div>
                {!! Form::number('telefono', null, ['class' => 'form-control', 'placeholder' => 'Telefono']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group" bis_skin_checked="1">
            {!! Form::label('direccion', 'Dirección : ',['class' => 'text-blue']) !!}
            {!! Form::textarea('direccion', null, ['class' => 'form-control', 'rows' => '2']) !!}
        </div>
        @error('direccion')
            <small class="text-danger mt-0">{{$message}}</small>
        @enderror
    </div>

    <div class="col-md-6">
        <div class="form-group" bis_skin_checked="1">
            {!! Form::label('observacion', 'Observación : ',['class' => 'text-blue']) !!}
            {!! Form::textarea('observacion', null, ['class' => 'form-control', 'rows' => '2']) !!}
        </div>
        @error('observacion')
            <small class="text-danger mt-0">{{$message}}</small>
        @enderror
    </div>
</div>

<br>

@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>


    <script>
        $(document).ready( function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

    </script>
@stop