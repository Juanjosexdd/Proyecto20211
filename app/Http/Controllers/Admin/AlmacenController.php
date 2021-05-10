<?php

namespace App\Http\Controllers\Admin;

use App\Models\Almacen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.almacens.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.almacens.create');
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
            'slug' => 'required|unique:almacens'
        ]);

        $almacen = Almacen::create($request->all());

        return redirect()->route('admin.almacens.edit', $almacen)->with('success', ' ¡Felicidades el almacen se creo con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function show(Almacen $almacen)
    {
        if($almacen->estatus=="1"){

            $almacen->estatus= '0';
            $almacen->save();
            return redirect()->route('admin.almacens.index')->with('success', 'El almacen està inactivo con exito...!!!');
       }else{

            $almacen->estatus= '1';
            $almacen->save();
            return redirect()->route('admin.almacens.index')->with('success', 'El almacen se activó con exito...!!!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function edit(Almacen $almacen)
    {
        return view ('admin.almacens.edit', compact('almacen'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Almacen $almacen)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:almacens,slug,$almacen->id",
            'descripcion' => 'required'
        ]);

        $almacen->update($request->all());
        return redirect()->route('admin.almacens.edit', $almacen)->with('success', ' ¡Felicidades el almacen se actualizó con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Almacen $almacen)
    {
        $almacen->delete();

        return redirect()->route('admin.almacens.index')->with('success', 'El almacen se eliminó con exito...');
    }
    
}
