<div>
    <a href=" {{route('admin.users.index')}} " class="float-right h5 text-blue"> Volver  <i class="fas fa-reply"></i></a>
    <p class="h3 text-blue">Informacion Personal</p>

    <hr>
    {!! Form::open(['route' => 'admin.users.store', 'autocomplete' => 'off', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('name', 'Nombres : ',['class' => 'text-blue']) !!}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                        </div>
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombres']) !!}

                    </div>
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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group" bis_skin_checked="1">
                    {!! Form::label('address', 'Dirección : ',['class' => 'text-blue']) !!}
                    <textarea class="form-control" name="address" id="address" rows="3" placeholder="Dirección" style="margin-top: 0px; margin-bottom: 0px; height: 71px;"></textarea>
                </div>
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
        <p class="h3 text-blue">Informacion Institucional</p>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div>
                    {!! Form::label('cargo_id', 'Cargo : ', ['class' => 'text-blue']) !!}
                    {!! Form::select('cargo_id', $cargos, null, ['class' => 'form-control']) !!}
                    @error('cargo_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    {{-- <label class="text-blue">Cargo : </label>
                    <select class="form-control" id="select2-dropdown">
                        <option value="">Selecciona una Opcion</option>
                        @foreach($cargos as $cargo)
                        <option value="{{ $cargo->id }}">{{ $cargo->id }} - {{ $cargo->nombre }} - {{ $cargo->descripcion }}</option>
                        @endforeach
                    </select> --}}
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
        {!! Form::submit('Guardar usuario', ['class' => 'btn btn-outline-primary btn-block']) !!}

    {!! Form::close() !!}

</div>
@section('css')
<link href=" {{asset('vendor/select2/css/select2.min.css')}} " rel="stylesheet" />
@stop
@section('js')
<script src="{{asset('vendor/select2/js/select2.min.js')}}"></script>
<script>

</script>
@stop
<script>
    
</script>
