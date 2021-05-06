<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estado;

class EstadoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.estados.index')->only('index');
    //     $this->middleware('can:admin.estados.create')->only('create','store');
    //     $this->middleware('can:admin.estados.edit')->only('edit','update');
    //     $this->middleware('can:admin.estados.destroy')->only('destroy');

    // }

    public function index()
    {

        return view ('admin.estados.index');
    }

    public function create()
    {
        return view ('admin.estados.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => 'required|unique:estados'
        ]);

        $estado = Estado::create($request->all());

        return redirect()->route('admin.estados.edit', $estado)->with('success', '¡Felicidades el estado se creó con éxito!');
    }

    public function edit(Estado $estado)
    {

        return view ('admin.estados.edit', compact('estado'));
        
    }

    public function update(Request $request, Estado $estado)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:estados,slug,$estado->id"
        ]);

        $estado->update($request->all());
        return redirect()->route('admin.estados.edit', $estado)->with('success', '¡Felicidades el estado se actualizó con éxito!');
    }

    public function destroy(Estado $estado)
    {
        $estado->delete();

        return redirect()->route('admin.estados.index')->with('success', '¡Felicidades el estado se Eliminó con éxito!');;
    }
}
