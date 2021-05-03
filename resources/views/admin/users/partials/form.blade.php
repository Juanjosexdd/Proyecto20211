<p class="h3 text-blue">Información Personal</p>
<hr>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('name', 'Nombres & ',['class' => 'text-blue']) !!}       {!! Form::label('slug', 'slug :',['class' => 'text-blue']) !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombres', ]) !!}
                {!! Form::hidden('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug' ,'readonly']) !!}
            </div>
            @error('name')
                <small class="text-danger mt-0">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('last_name', 'Apellidos : ',['class' => 'text-blue']) !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Apellidos']) !!}
            </div>
            @error('last_name')
                <small class="text-danger mt-0">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-1">
            {!! Form::label('nacionalidad_id', 'N : ',['class' => 'text-blue']) !!}
            {!! Form::select('nacionalidad_id', $nacionalidads, null, ['class' => 'form-control']) !!}
            @error('nacionalidad_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="text-blue">Cedula: </label>
            {!! Form::label('cedula', 'Cedula : ',['class' => 'text-blue']) !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {!! Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Cedula']) !!}
            </div>
            @error('cedula')
                <small class="text-danger mt-0">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('phone', 'Celular : ',['class' => 'text-blue']) !!}
            <div class="input-group" bis_skin_checked="1">
                <div class="input-group-prepend" bis_skin_checked="1">
                    <span class="input-group-text"><i class="fas fa-phone text-blue"></i></span>
                </div>
                {!! Form::number('phone', null, ['class' => 'form-control', 'placeholder' => 'Celular']) !!}
            </div>
        </div>
        @error('phone')
            <small class="text-danger mt-0">{{$message}}</small>
        @enderror
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('phone2', 'Telefono : ',['class' => 'text-blue']) !!}
            <div class="input-group" bis_skin_checked="1">
                <div class="input-group-prepend" bis_skin_checked="1">
                    <span class="input-group-text"><i class="fas fa-home text-blue"></i></span>
                </div>
                {!! Form::number('phone2', null, ['class' => 'form-control', 'placeholder' => 'Telefono']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('email', 'Correo eléctronico : ',['class' => 'text-blue']) !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope text-blue"></i></span>
                </div>
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Correo electronico']) !!}
            </div>
            @error('email')
                <small class="text-danger mt-0">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group" bis_skin_checked="1">
            {!! Form::label('address', 'Dirección : ',['class' => 'text-blue']) !!}
            {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => '2']) !!}
        </div>
        @error('address')
            <small class="text-danger mt-0">{{$message}}</small>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('password', 'Contraseña : ',['class' => 'text-blue']) !!}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                </div>
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
            </div>
        </div>
    </div>
</div>
<br>
<p class="h3 text-blue">Información Institucional</p>
<hr>
<div class="row">
    <div class="col-md-6">
        <div>
            {!! Form::label('cargo_id', 'Cargo : ', ['class' => 'text-blue']) !!}
            {!! Form::select('cargo_id', $cargos, null, ['class' => 'form-control']) !!}
            @error('cargo_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div wire:model('render')>
            {!! Form::label('departamento_id', 'Departamento :', ['class' => 'text-blue']) !!}
            {!! Form::select('departamento_id', $departamentos, null, ['class' => 'form-control']) !!}
            @error('departamento_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
<br>
<p class="h3 text-blue">Roles</p>
<hr>
<div class="row">
    <div class="col-md-12">
        @foreach ($roles as $role)
                <div class="">
                    <label class="text-blue">
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{$role->name}}
                    </label>    
                </div>                    
            @endforeach
    </div>
</div>

@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>


    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

    </script>
@stop