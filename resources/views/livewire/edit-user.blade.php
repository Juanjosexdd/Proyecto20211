<div>
    <a class="btn btn-outline-info btn-sm" href="" wire:click="$set('open', true)" role="button">
        <i class="fas fa-edit"></i>
    </a>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar Usuario
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="image" class="bg-green-100 mb-5 w-full border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg width="20" height="20" fill="currentColor" class="mr-2 animate-spin" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path d="M526 1394q0 53-37.5 90.5t-90.5 37.5q-52 0-90-38t-38-90q0-53 37.5-90.5t90.5-37.5 90.5 37.5 37.5 90.5zm498 206q0 53-37.5 90.5t-90.5 37.5-90.5-37.5-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm-704-704q0 53-37.5 90.5t-90.5 37.5-90.5-37.5-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm1202 498q0 52-38 90t-90 38q-53 0-90.5-37.5t-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm-964-996q0 66-47 113t-113 47-113-47-47-113 47-113 113-47 113 47 47 113zm1170 498q0 53-37.5 90.5t-90.5 37.5-90.5-37.5-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm-640-704q0 80-56 136t-136 56-136-56-56-136 56-136 136-56 136 56 56 136zm530 206q0 93-66 158.5t-158 65.5q-93 0-158.5-65.5t-65.5-158.5q0-92 65.5-158t158.5-66q92 0 158 66t66 158z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold flex">Imagen Cargando. 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        </p>
                        <p class="text-sm">Espere un momento hasta que la imagen se haya procesado. </p>
                    </div>
                </div>
            </div>
            @if ($image)
                <img class="object-cover object-center" src="{{$image->temporaryUrl()}}" alt="">
            @else
                <img src="{{Storage::url($user->image)}}" alt="">
            @endif
            <div class="mb-4">
                <x-jet-label value="Título del post" />
                <x-jet-input wire:model="user.name" type="text" class="w-full" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Contenido del post" />
                <x-jet-input wire:model="user.email" type="email" class="w-full" />
            </div>
            <div>
                <input type="file" wire:model="image" id="{{$identificador}}">
                <x-jet-input-error for="image" />
            </div>
        </x-slot>
        <x-slot name="footer">
        </x-slot>

    </x-jet-dialog-modal>
</div>
