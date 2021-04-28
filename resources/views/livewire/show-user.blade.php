<div>
    <div class="card" bis_skin_checked="1">
        <div class="card-header" bis_skin_checked="1">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="h3">Listado de usuarios</h3>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input wire:model="search" type="email" class="form-control" placeholder="Buscar">
                    </div>
                </div>
                <div class="col-md-1">
                    @livewire('create-user')
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0" bis_skin_checked="1">
        @if ($users->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>nombre</th>
                        <th>email</th>
                        <th class="relative">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td class=" text-sm font-medium">
                                @livewire('edit-user', ['user' => $user], key($user->id))
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
