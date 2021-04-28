<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditUser extends Component
{
    public $open = false;
    public $user, $image, $identificador;
    use WithFileUploads;

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required',
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->identificador = rand();
    }

    public function save()
    {
        $this->validate();

        if ($this->image)
        {
            Storage::delete([$this->user->image]);
            $this->user->image = $this->image->store('users');
        }
        $this->user->save();
        $this->reset(['open','image']);
        $this->emit('show-user','render');
        $this->emit('alert', 'El user se actualizó satisfactoriamente');

    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
