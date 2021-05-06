<a href=" {{route('admin.ciudads.index')}} " class="float-right h5 text-blue"><i class="fas fa-reply"></i>    Volver</a>
<p class="h3 text-blue">Municipio</p>
<hr>
<div class="row">
    <div class="col-md-6">
        <div wire:model('render')>
            {!! Form::label('estado_id', 'Estado :', ['class' => 'text-blue']) !!}
            {!! Form::select('estado_id', $estados, null, ['class' => 'form-control']) !!}
            @error('estado_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre del municipio & ',['class' => 'text-blue ']) !!}       {!! Form::label('slug', 'slug :',['class' => 'text-blue']) !!}
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