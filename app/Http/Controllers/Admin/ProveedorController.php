<?php

namespace App\Http\Controllers\Admin;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tipodocumento;
use App\Http\Requests\ProveedorRequest;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.proveedors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipodocumentos = Tipodocumento::pluck('abreviado', 'id');
        
        return view('admin.proveedors.create', compact('tipodocumentos'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorRequest $request)
    {

        $proveedor = Proveedor::create($request->all());

        return redirect()->route('admin.proveedors.edit', $proveedor)->with('success', ' ¡Felicidades el proveedor se creo con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        if($proveedor->estatus=="1"){

            $proveedor->estatus= '0';
            $proveedor->save();
            return redirect()->route('admin.proveedors.index')->with('success', 'El proveedor está inactivo con exito!');

       }else{

            $proveedor->estatus= '1';
            $proveedor->save();
            return redirect()->route('admin.proveedors.index')->with('success', 'El proveedor se activó con exito!');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        $tipodocumentos = Tipodocumento::pluck('abreviado', 'id');
        return view('admin.proveedors.edit', compact('tipodocumentos','proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor->update($request->all());
        
        return redirect()->route('admin.proveedors.edit', $proveedor)->with('success', 'El proveedor se actualizó con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }
}
