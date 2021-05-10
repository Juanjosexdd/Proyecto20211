<?php

namespace App\Http\Controllers\Admin;

use App\Models\Almacen;
use App\Models\Ingreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Models\Detalleingreso;
use App\Models\Proveedor;
use App\Models\Tipodocumento;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

use App\Http\Controllers\Controller;
use App\Http\Requests\IngresoFormRequest;
use App\Models\Producto;
use App\Models\Tipomovimiento;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ingresos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipomovimients = Tipomovimiento::pluck('descripcion', 'id');
        $users = User::pluck('name', 'id');
        $proveedors = Proveedor::pluck('nombre', 'id');
        $almacens = Almacen::pluck('nombre', 'id');
        $productos = Producto::pluck('nombre', 'id');

        return view('admin.ingresos.create', compact('proveedors','users','almacens','tipomovimients','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            // $ingreso= new Ingreso;
            // $ingreso->proveedor_id=$request->get('proveedor_id');
            // // $ingreso->tipomovimento_id=$request->get('tipomovimento_id');
            // $ingreso->user_id=$request->get('user_id');
            // $ingreso->save();
            
            // $producto_id = $request->get('producto_id');
            // $almacen_id = $request->get('almacen_id');
            // $cantidad = $request->get('cantidad');
            $ingreso= new Ingreso;
            $ingreso->proveedor_id=$request->proveedor_id;
            // $ingreso->tipomovimento_id=$request->tipomovimento_id;
            $ingreso->user_id=$request->user_id;
            $ingreso->save();
            
            $producto_id = $request->producto_id;
            $almacen_id = $request->almacen_id;
            // $cantidad = $request->get('cantidad');
            $cantidad=$request->cantidad;
            $cont = 0;

            while($cont < count($producto_id)){
                $detalle = new Detalleingreso();
                $detalle->ingreso_id= $ingreso->id;
                $detalle->almacen_id= $almacen_id[$cont];
                $detalle->producto_id= $producto_id[$cont];
                $detalle->cantidad= $cantidad[$cont];
                $detalle->save();
                $cont=$cont+1;
            }

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();
        }

        return view('admin.ingresos.index')->with('success', 'Guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingreso $ingreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingreso $ingreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingreso=Ingreso::findOrFail($id);
        $ingreso->estatus=2;
        $ingreso->update();
        return view('admin.ingresos.index');
    }
}
