<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargo::all();
        return Inertia::render('Cargos/index', [
            'cargos' => Cargo::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/',
            'descripcion' => 'required|max:100'
        ]);

        $cargo = new Cargo($request->input());
        $cargo->save();
        return redirect('cargos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cargo $cargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cargo $cargo)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cargo $cargo)
    {
        // $request->validate([
        //     'nombre' => 'required|max:50',
        //     'descripcion' => 'required|max:100'
        // ]);
        // $cargo =new Cargo($request->input());
        // $cargo->update($request->input());
        $data = $request->all();
        $cargo ->update($data);
        return redirect('cargos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return redirect('cargos');
    }
}
