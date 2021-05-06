<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departamento;
use Illuminate\Support\Facades\Validator;

class DepartamentoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.departamentos.index')->only('index');
    //     $this->middleware('can:admin.departamentos.create')->only('create','store');
    //     $this->middleware('can:admin.departamentos.edit')->only('edit','update');
    //     $this->middleware('can:admin.departamentos.destroy')->only('destroy');

    // }

    public function index()
    {

        return view ('admin.departamentos.index');
    }

    public function create()
    {
        return view ('admin.departamentos.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'slug' => 'required|unique:departamentos'
        ]);

        // $validator = Validator::make($request->all(), [
        //     'nombre' => 'required',
        //     'descripcion' => 'required',
        //     'slug' => 'required|unique:departamentos'
        // ]);

        // if ($validator->fails()) {
        //     return back()->with('error', $validator->messages()->all()[0])->withInput();
        // }

        $departamento = Departamento::create($request->all());

        return redirect()->route('admin.departamentos.edit', $departamento)->with('toast_success', 'Felicidades el departamento se creo con exito...');
    }

    public function edit(Departamento $departamento)
    {

        return view ('admin.departamentos.edit', compact('departamento'));
        
    }

    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:departamentos,slug,$departamento->id",
            'descripcion' => 'required'
        ]);

        $departamento->update($request->all());
        return redirect()->route('admin.departamentos.edit', $departamento)->with('success', 'El departamento se actualizó con exito...');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();

        return redirect()->route('admin.departamentos.index')->with('success', 'El departamento se eliminó con exito...');
    }
}
