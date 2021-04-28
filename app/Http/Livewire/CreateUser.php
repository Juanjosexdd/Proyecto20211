<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads;

    public $open = false;

    public $name, $email, $image;

    protected $rules = [
        'name' => 'required|max:50',
        'email' => 'required|max:500',
        'image' => 'required|image|max:2048'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function save()
    {

        $this->validate();
        $image = $this->image->store('posts');
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'image'=> $image
        ]);

        $this->reset(['open', 'name', 'email', 'image']);

        $this->emit('render');
        $this->emit('alert', 'El usuario se creo satisfactoriamente');
    }
    public function render()
    {
        return view('livewire.create-user');
    }
}
