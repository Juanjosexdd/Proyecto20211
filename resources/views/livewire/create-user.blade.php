<div>
    <p class="h3">Informacion Personal</p>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-blue">Nombres: </label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Nombres">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-blue">Apellidos: </label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Apellidos">
                </div>
            </div>
        </div>
        <div class="col-md-1">
                <label class="text-blue">N : </label>
                <select class="form-control js-example-basic-single" id="select2-dropdown">
                    <option value=""> </option>
                    @foreach($nacionalidads as $nacionalidad)
                    <option value="{{ $nacionalidad->id }}">{{ $nacionalidad->id }} - {{ $nacionalidad->abreviado }}</option>
                    @endforeach
                </select>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="text-blue">Cedula: </label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-address-card text-blue"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Cedula">
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-blue">Celular:</label>
                <div class="input-group" bis_skin_checked="1">
                    <div class="input-group-prepend" bis_skin_checked="1">
                        <span class="input-group-text"><i class="fas fa-phone text-blue"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" inputmode="text">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-blue">Telefono :</label>
                <div class="input-group" bis_skin_checked="1">
                    <div class="input-group-prepend" bis_skin_checked="1">
                        <span class="input-group-text"><i class="fas fa-home text-blue"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" inputmode="text">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-blue">Correo eléctronico</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope text-blue"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Email">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" bis_skin_checked="1">
                <label class="text-blue">Dirección</label>
                <textarea class="form-control" rows="3" placeholder="Dirección" style="margin-top: 0px; margin-bottom: 0px; height: 71px;"></textarea>
            </div>
        </div>
    </div>
   <br>
   <p class="h3">Informacion Institucional</p>
   <hr>
    <div class="row">
        <div class="col-md-4">
            <div wire:model('render')>
                <select class="form-control js-example-basic-single" id="select2-dropdown">
                    <option value="">Selecciona una Opcion</option>
                    @foreach($cargos as $cargo)
                    <option value="{{ $cargo->id }}">{{ $cargo->id }} - {{ $cargo->nombre }} - {{ $cargo->descripcion }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

</div>
@section('css')
<link href=" {{asset('vendor/select2/css/select2.min.css')}} " rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop
@section('js')
<script src="{{asset('vendor/select2/js/select2.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
@stop
<script>
    $(function () 
    {
        $('.select2').select2()
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    }
    $(document).ready(function () {
        $('#select2-dropdown').select2();
        $('#select2-dropdown').on('change', function (e) {
            var data = $('#select2-dropdown').select2("val");
            @this.set('$cargos', data);
        });
    });
</script>
