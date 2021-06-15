<?php

namespace App\Http\Controllers;

use App\Nuevocrud;
use Illuminate\Http\Request;

/**
 * Class NuevocrudController
 * @package App\Http\Controllers
 */
class NuevocrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nuevocruds = Nuevocrud::paginate();

        return view('nuevocrud.index', compact('nuevocruds'))
            ->with('i', (request()->input('page', 1) - 1) * $nuevocruds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nuevocrud = new Nuevocrud();
        return view('nuevocrud.create', compact('nuevocrud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Nuevocrud::$rules);

        $nuevocrud = Nuevocrud::create($request->all());

        return redirect()->route('nuevocruds.index')
            ->with('success', 'Nuevocrud created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nuevocrud = Nuevocrud::find($id);

        return view('nuevocrud.show', compact('nuevocrud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nuevocrud = Nuevocrud::find($id);

        return view('nuevocrud.edit', compact('nuevocrud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Nuevocrud $nuevocrud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nuevocrud $nuevocrud)
    {
        request()->validate(Nuevocrud::$rules);

        $nuevocrud->update($request->all());

        return redirect()->route('nuevocruds.index')
            ->with('success', 'Nuevocrud updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $nuevocrud = Nuevocrud::find($id)->delete();

        return redirect()->route('nuevocruds.index')
            ->with('success', 'Nuevocrud deleted successfully');
    }
}
