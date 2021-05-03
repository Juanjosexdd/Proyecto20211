<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ciudad;
use App\Models\Estado;

class CiudadController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.ciudads.index')->only('index');
    //     $this->middleware('can:admin.ciudads.create')->only('create','store');
    //     $this->middleware('can:admin.ciudads.edit')->only('edit','update');
    //     $this->middleware('can:admin.ciudads.destroy')->only('destroy');

    // }

    public function index()
    {

        return view ('admin.ciudads.index');
    }

    public function create()
    {
        $estados = Estado::pluck('nombre','id');

        return view ('admin.ciudads.create', compact('estados'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => 'required|unique:ciudads',
            'estados_id' =>'required'
        ]);

        $ciudad = Ciudad::create($request->all());
        if ($request->ciudads) {
            $ciudad->estado()->attach($request->estados);
        }

        return redirect()->route('admin.ciudads.edit', $ciudad)->with('info', 'El ciudad se creo con exito...');
    }

    public function edit(Ciudad $ciudad)
    {

        return view ('admin.ciudads.edit', compact('ciudad'));
        
    }

    public function update(Request $request, Ciudad $ciudad)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:ciudads,slug,$ciudad->id",
        ]);

        $ciudad->update($request->all());
        return redirect()->route('admin.ciudads.edit', $ciudad)->with('info', 'El ciudad se actualizó con exito...');
    }

    public function destroy(Ciudad $ciudad)
    {
        $ciudad->delete();

        return redirect()->route('admin.ciudads.index')->with('info', 'El ciudad se eliminó con exito...');
    }
}
