<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo;

class CargoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.cargos.index')->only('index');
    //     $this->middleware('can:admin.cargos.create')->only('create','store');
    //     $this->middleware('can:admin.cargos.edit')->only('edit','update');
    //     $this->middleware('can:admin.cargos.destroy')->only('destroy');

    // }

    public function index()
    {

        return view ('admin.cargos.index');
    }

    public function create()
    {
        return view ('admin.cargos.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'slug' => 'required|unique:cargos'
        ]);

        $cargo = Cargo::create($request->all());

        return redirect()->route('admin.cargos.edit', $cargo)->with('info', 'El cargo se creo con exito...');
    }

    public function edit(Cargo $cargo)
    {

        return view ('admin.cargos.edit', compact('cargo'));
        
    }

    public function update(Request $request, Cargo $cargo)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:cargos,slug,$cargo->id",
            'descipcion' => 'required'
        ]);

        $cargo->update($request->all());
        return redirect()->route('admin.cargos.edit', $cargo)->with('info', 'El cargo se actualizó con exito...');
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->delete();

        return redirect()->route('admin.cargos.index')->with('info', 'El cargo se eliminó con exito...');
    }
}
