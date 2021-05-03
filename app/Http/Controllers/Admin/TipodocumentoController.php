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

        $tipodocuneto = Tipodocumento::create($request->all());

        return redirect()->route('admin.tipodocumentos.edit', $tipodocuneto)->with('info', 'La tipodocuneto se creo con exito...');
    }

    public function edit(Tipodocumento $tipodocuneto)
    {

        return view ('admin.tipodocumentos.edit', compact('tipodocuneto'));
        
    }

    public function update(Request $request, Tipodocumento $tipodocuneto)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:tipodocumentos,slug,$tipodocuneto->id",
            'abreviado' => 'required'
        ]);

        $tipodocuneto->update($request->all());
        return redirect()->route('admin.tipodocumentos.edit', $tipodocuneto)->with('info', 'La tipodocuneto se actualizó con exito...');
    }

    public function destroy(Tipodocumento $tipodocuneto)
    {
        $tipodocuneto->delete();

        return redirect()->route('admin.tipodocumentos.index')->with('info', 'La tipodocuneto se eliminó con exito...');
    }
}
