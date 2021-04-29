<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Nacionalidad;

class CreateUser extends Component
{

    public $ottPlatform = '';
 
    public $webseries = [
        'Wanda Vision',
        'Money Heist',
        'Lucifer',
        'Stranger Things'
    ];     
    public function render()
    {
        $departamentos = Departamento::all();
        $nacionalidads = Nacionalidad::all();
        $cargos = Cargo::all();
        return view('livewire.create-user', compact('cargos','departamentos','nacionalidads'));
    }
}
