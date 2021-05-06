<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empleado;

class ShowEmpleado extends Component
{
    protected $paginationTheme = "bootstrap";
    use WithPagination;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['render' => 'render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    

    public function render()
    {
        $empleados = Empleado::where('cedula', 'like', '%' . $this->search . '%')
                   ->orWhere('nombres', 'like', '%' . $this->search . '%')
                   ->orWhere('cargo_id', 'like', '%' . $this->search . '%')
                   ->orWhere('email', 'like', '%' . $this->search . '%')
                   ->orderBy($this->sort, $this->direction)
                   ->paginate(10);
                   
        return view('livewire.show-empleado', compact('empleados'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
        
        $this->sort = $sort;
    }

}
