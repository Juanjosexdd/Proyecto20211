<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipodocumento;

class TipodocumentoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.tipodocumentos.index')->only('index');
    //     $this->middleware('can:admin.tipodocumentos.create')->only('create','store');
    //     $this->middleware('can:admin.tipodocumentos.edit')->only('edit','update');
    //     $this->middleware('can:admin.tipodocumentos.destroy')->only('destroy');

    // }

    public function index()
    {

        return view ('admin.tipodocumentos.index');
    }

    public function create()
    {
        return view ('admin.tipodocumentos.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'abreviado' => 'required',
            'slug' => 'required|unique:tipodocumentos'
        ]);

        $tipodocumento = Tipodocumento::create($request->all());

        return redirect()->route('admin.tipodocumentos.edit', $tipodocumento)->with('success', 'El tipo de documento se creo con exito!');
    }

    public function edit(Tipodocumento $tipodocumento)
    {

        return view ('admin.tipodocumentos.edit', compact('tipodocumento'));
        
    }

    public function update(Request $request, Tipodocumento $tipodocumento)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:tipodocumentos,slug,$tipodocumento->id",
            'abreviado' => 'required'
        ]);

        $tipodocumento->update($request->all());
        return redirect()->route('admin.tipodocumentos.edit', $tipodocumento)->with('success', 'El tipo de documento se actualizó con exito!');
    }

    public function destroy(Tipodocumento $tipodocumento)
    {
        $tipodocumento->delete();

        return redirect()->route('admin.tipodocumentos.index')->with('success', 'El tipodocumento se eliminó con exito!');
    }
}
