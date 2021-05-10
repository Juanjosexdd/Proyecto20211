<?php

namespace App\Http\Controllers\Admin;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmpleadoRequest;
use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Tipodocumento;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.empleados.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipodocumentos = Tipodocumento::pluck('abreviado', 'id');
        $cargos = Cargo::pluck('nombre', 'id');
        $departamentos = Departamento::pluck('nombre', 'id');

        return view('admin.empleados.create', compact('tipodocumentos','cargos','departamentos'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoRequest $request)
    {
        $empleado = Empleado::create($request->all());
        
        
        return redirect()->route('admin.empleados.index')->with('success', 'El trabajador se registro con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        if($empleado->estatus=="1"){

            $empleado->estatus= '0';
            $empleado->save();
            return redirect()->route('admin.empleados.index')->with('success', 'El usuario està inactivo con exito.!');

       }else{

            $empleado->estatus= '1';
            $empleado->save();
            return redirect()->route('admin.empleados.index')->with('success', 'El usuario se activó con exito!');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        $tipodocumentos = Tipodocumento::pluck('abreviado', 'id');
        $cargos = Cargo::pluck('nombre', 'id');
        $departamentos = Departamento::pluck('nombre', 'id');

        return view('admin.empleados.edit', compact('tipodocumentos','cargos','departamentos','empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $empleado->update($request->all());
        
        return redirect()->route('admin.empleados.index')->with('success', 'El trabajador se actualizó con exito.!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
