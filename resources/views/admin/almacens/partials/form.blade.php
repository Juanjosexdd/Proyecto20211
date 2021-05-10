<a href=" {{route('admin.almacens.index')}} " class="float-right h5 text-blue"><i class="fas fa-reply"></i>    Volver</a>
<p class="h3 text-blue">Almacenes</p>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre & ',['class' => 'text-blue ']) !!}       {!! Form::label('slug', 'slug :',['class' => 'text-blue']) !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                {!! Form::hidden('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug' ,'readonly']) !!}
            </div>
            @error('nombre')
                <small class="text-danger mt-0">{{$message}}</small>
            @enderror
        </div>
    </div>
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