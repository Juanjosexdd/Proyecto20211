<a href=" {{route('admin.productos.index')}} " class="float-right h5 text-blue"><i class="fas fa-reply"></i>    Volver</a>
<p class="h3 text-blue">Producto</p>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre & ',['class' => 'text-blue ']) !!}       {!! Form::label('slug', 'slug :',['class' => 'text-blue']) !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {{ Form::text('nombre', null, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('nombre', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                {!! Form::hidden('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug' ,'readonly']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div>
            {!! Form::label('clacificacion_id', 'Clacificacion : ', ['class' => 'text-blue']) !!}
            {!! Form::select('clacificacion_id', $clacificaciones, null, ['class' => 'form-control']) !!}
            @error('clacificacion_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('unidad_medida', 'Unidad de midida : ',['class' => 'text-blue']) !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-ad"></i></span>
                </div>
                {!! Form::text('unidad_medida', null, ['class' => 'form-control', 'placeholder' => 'Descripción']) !!}
            </div>
            @error('unidad_medida')
                <small class="text-danger mt-0">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('descripcion', 'Descripción : ',['class' => 'text-blue']) !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-ad"></i></span>
                </div>
                {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción']) !!}
            </div>
            @error('descripcion')
                <small class="text-danger mt-0">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('minimo', 'Minimo : ',['class' => 'text-blue']) !!}
            <div class="input-group" bis_skin_checked="1">
                <div class="input-group-prepend" bis_skin_checked="1">
                    <span class="input-group-text"><i class="fas fa-sort-amount-down-alt text-blue"></i></span>
                </div>
                {!! Form::number('minimo', null, ['class' => 'form-control', 'placeholder' => 'Minimo']) !!}
            </div>
        </div>
        @error('minimo')
            <small class="text-danger mt-0">{{$message}}</small>
        @enderror
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('maximo', 'Maximo : ',['class' => 'text-blue']) !!}
            <div class="input-group" bis_skin_checked="1">
                <div class="input-group-prepend" bis_skin_checked="1">
                    <span class="input-group-text"><i class="fas fa-sort-amount-up text-blue"></i></span>
                </div>
                {!! Form::number('maximo', null, ['class' => 'form-control', 'placeholder' => 'Maximo']) !!}
            </div>
        </div>
        @error('maximo')
            <small class="text-danger mt-0">{{$message}}</small>
        @enderror
    </div>
</div>

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