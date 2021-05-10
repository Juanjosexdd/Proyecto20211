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

    public function show(Cargo $cargo)
    {
        if($cargo->estatus=="1"){

            $cargo->estatus= '0';
            $cargo->save();
            return redirect()->route('admin.cargos.index')->with('success', 'El cargo està inactivo con exito...!!!');

       }else{

            $cargo->estatus= '1';
            $cargo->save();
            return redirect()->route('admin.cargos.index')->with('success', 'El cargo se activó con exito...!!!');

        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'slug' => 'required|unique:cargos'
        ]);

        $cargo = Cargo::create($request->all());

        return redirect()->route('admin.cargos.edit', $cargo)->with('success', ' ¡Felicidades el cargo se creo con éxito!');
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
            'descripcion' => 'required'
        ]);

        $cargo->update($request->all());
        return redirect()->route('admin.cargos.edit', $cargo)->with('success', ' ¡Felicidades el cargo se actualizó con éxito!');
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->delete();

        return redirect()->route('admin.cargos.index')->with('success', ' ¡Felicidades el cargo se eliminó con éxito!');
    }
}
