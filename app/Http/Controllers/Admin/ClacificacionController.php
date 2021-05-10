<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clacificacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClacificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.clacificacions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.clacificacions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'slug' => 'required|unique:clacificacions'
        ]);

        $clacificacion = Clacificacion::create($request->all());

        return redirect()->route('admin.clacificacions.edit', $clacificacion)->with('success', ' ¡Felicidades la clacificacion se creo con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clacificacion  $clacificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Clacificacion $clacificacion)
    {
        if($clacificacion->estatus=="1"){

            $clacificacion->estatus= '0';
            $clacificacion->save();
            return redirect()->route('admin.clacificacions.index')->with('success', 'El clacificacion està inactivo con exito!');
       }else{

            $clacificacion->estatus= '1';
            $clacificacion->save();
            return redirect()->route('admin.clacificacions.index')->with('success', 'El clacificacion se activó con exito!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clacificacion  $clacificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Clacificacion $clacificacion)
    {
        return view('admin.clacificacions.edit', compact('clacificacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clacificacion  $clacificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clacificacion $clacificacion)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:clacificacions,slug,$clacificacion->id",
            'abreviado' => 'required',
            'descripcion' => 'required'
        ]);

        $clacificacion->update($request->all());
        return redirect()->route('admin.clacificacions.edit', $clacificacion)->with('success', ' ¡Felicidades el clacificacion se actualizó con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clacificacion  $clacificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clacificacion $clacificacion)
    {
        $clacificacion->delete();

        return redirect()->route('admin.clacificacions.index')->with('success', 'El clacificacion se eliminó con exito!');
    }
}
