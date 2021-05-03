<div>
    <div class="card uppercase" bis_skin_checked="1">
        <div class="card-header" style="padding: .75rem .25rem" bis_skin_checked="1">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input wire:model="search" type="email" class="form-control mr-2" placeholder="Buscar">
                <a href="{{route('admin.users.create')}}" class="btn bg-navy btn-sm px-2 elevation-4"><i class="fas fa-plus mt-2 px-3"></i></a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0" bis_skin_checked="1">
        @if ($users->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" role="button" wire:click="order('id')">
                            ID
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
                        <th scope="col" role="button" wire:click="order('cedula')">
                            Identificacion
                            @if ($sort == 'cedula')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-numeric-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-numeric-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" role="button" wire:click="order('name')">
                            nombre
                            @if ($sort == 'name')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" role="button" wire:click="order('email')">
                            email
                            @if ($sort == 'email')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" role="button" wire:click="order('cargo_id')">
                            Cargo
                            @if ($sort == 'cargo_id')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th colspan="2">Estatus</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td> {{$user->tipodocumento->abreviado}}-{{$user->cedula}} </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td> {{$user->cargo->nombre}}</td>

                            <td> 
                                @if ($user->estatus == 1)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Inactivo <i class="fad fa-user-times"></i></span>
                                @endif
                            </td>
                            <td width="8px">
                                <a class="btn btn-outline-info btn-sm mr-1 elevation-4" href=" {{route('admin.users.edit',$user)}} "><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="8px">
                                <form action="{{route('admin.users.destroy', $user)}}" method="POST">
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
                {{ $users->links() }}
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

    <style>
        .card-custom {
            overflow: hidden;
            min-height: 450px;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
        }

        .card-custom-img {
            height: 50px;
            min-height: 10px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-color: inherit;
        }

        /* First border-left-width setting is a fallback */
        .card-custom-img::after {
            position: absolute;
            content: '';
            top: 161px;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-top-width: 40px;
            border-right-width: 0;
            border-bottom-width: 0;
            border-left-width: 545px;
            border-left-width: calc(575px - 5vw);
            border-top-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            border-left-color: inherit;
        }

        .card-custom-avatar img {
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
            position: absolute;
            top: 10px;
            left: 1.25rem;
            width: 50px;
            height: 50px;
        }

    </style>
@stop

@section('js')
<script src="{{asset('js/sweetalert2.min.js') }}"></script>


    <script>
    //     if (result.value) {
    //     $("#formularioEliminar-").submit();
    //     Swal.fire({
    //         title: 'Are you sure?',
    //          text: "You won't be able to revert this!",
    //          icon: 'warning',
    //          showCancelButton: true,
    //          confirmButtonColor: '#3085d6',
    //          cancelButtonColor: '#d33',
    //          confirmButtonText: 'Yes, delete it!'
    //          }).then((result) => {
    //          if (result.isConfirmed) {
    //              Swal.fire(
    //             'Deleted!',
    //              'Your file has been deleted.',
    //              'success'
    //              )
    //          }
    //          })
    //     )
    // }
        
//   $(function() {
//     var Toast = Swal.mixin({
//       toast: true,
//       position: 'top-end',
//       showConfirmButton: false,
//       timer: 3000
//     });

//     $('.swalDefaultSuccess').click(function() {
//       Toast.fire({
//         icon: 'success',
//         title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.swalDefaultInfo').click(function() {
//         Swal.fire({
//             title: 'Are you sure?',
//             text: "You won't be able to revert this!",
//             icon: 'warning',
//             showCancelButton: true,
//             confirmButtonColor: '#3085d6',
//             cancelButtonColor: '#d33',
//             confirmButtonText: 'Yes, delete it!'
//             }).then((result) => {
//             if (result.isConfirmed) {
//                 Swal.fire(
//                 'Deleted!',
//                 'Your file has been deleted.',
//                 'success'
//                 )
//             }
//             })
//     });
//     $('.swalDefaultError').click(function() {
//       Toast.fire({
//         icon: 'error',
//         title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.swalDefaultWarning').click(function() {
//       Toast.fire({
//         icon: 'warning',
//         title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.swalDefaultQuestion').click(function() {
//       Toast.fire({
//         icon: 'question',
//         title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });

//     $('.toastrDefaultSuccess').click(function() {
//       toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
//     });
//     $('.toastrDefaultInfo').click(function() {
//       toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
//     });
//     $('.toastrDefaultError').click(function() {
//       toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
//     });
//     $('.toastrDefaultWarning').click(function() {
//       toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
//     });

//     $('.toastsDefaultDefault').click(function() {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultTopLeft').click(function() {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         position: 'topLeft',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultBottomRight').click(function() {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         position: 'bottomRight',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultBottomLeft').click(function() {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         position: 'bottomLeft',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultAutohide').click(function() {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         autohide: true,
//         delay: 750,
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultNotFixed').click(function() {
//       $(document).Toasts('create', {
//         title: 'Toast Title',
//         fixed: false,
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultFull').click(function() {
//       $(document).Toasts('create', {
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         icon: 'fas fa-envelope fa-lg',
//       })
//     });
//     $('.toastsDefaultFullImage').click(function() {
//       $(document).Toasts('create', {
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         image: '../../dist/img/user3-128x128.jpg',
//         imageAlt: 'User Picture',
//       })
//     });
//     $('.toastsDefaultSuccess').click(function() {
//       $(document).Toasts('create', {
//         class: 'bg-success',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultInfo').click(function() {
//       $(document).Toasts('create', {
//         class: 'bg-info',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultWarning').click(function() {
//       $(document).Toasts('create', {
//         class: 'bg-warning',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultDanger').click(function() {
//       $(document).Toasts('create', {
//         class: 'bg-danger',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//     $('.toastsDefaultMaroon').click(function() {
//       $(document).Toasts('create', {
//         class: 'bg-maroon',
//         title: 'Toast Title',
//         subtitle: 'Subtitle',
//         body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//       })
//     });
//   });

    </script>
@stop