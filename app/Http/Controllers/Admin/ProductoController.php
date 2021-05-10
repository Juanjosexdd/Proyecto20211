<?php

namespace App\Http\Controllers\Admin;

use App\Models\Producto;
use App\Models\Clacificacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.productos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clacificaciones = Clacificacion::pluck('abreviado','id');

        return view('admin.productos.create', compact('clacificaciones'));
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
            'slug' => 'required|unique:productos'
        ]);

        $producto = Producto::create($request->all());

        return redirect()->route('admin.productos.edit', $producto)->with('success', ' ¡Felicidades el producto se creo con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        if($producto->estatus=="1"){

            $producto->estatus= '0';
            $producto->save();
            return redirect()->route('admin.productos.index')->with('success', 'El producto se inactivo con exito!');
       }else{

            $producto->estatus= '1';
            $producto->save();
            return redirect()->route('admin.productos.index')->with('success', 'El producto se activó con exito!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('admin.productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:productos,slug,$producto->id",
            'descripcion' => 'required'
        ]);

        $producto->update($request->all());
        return redirect()->route('admin.productos.edit', $producto)->with('success', ' ¡Felicidades el producto se actualizó con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('admin.productos.index')->with('success', 'El producto se eliminó con exito!');
    }
}
