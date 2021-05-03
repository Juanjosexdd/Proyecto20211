<div>
    <a href=" {{route('admin.users.index')}} " class="float-right h5 text-blue"><i class="fas fa-reply"></i>  Volver  </a>

    {!! Form::open(['route' => 'admin.users.store', 'autocomplete' => 'off', 'files' => true]) !!}
        @include('admin.users.partials.form')
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
