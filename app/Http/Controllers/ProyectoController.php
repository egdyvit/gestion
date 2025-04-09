<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyecto = Proyecto::all();
        return Inertia::render('Proyectos/index', [
            'proyectos' => Proyecto::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Proyectos/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/',
            'descripcion' => 'required|max:500',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'responsable_id' => ['required', 'integer', Rule::exists('responsables', 'id')],
            'estado' => [
                'required',
                Rule::in(['finalizado', 'activo', 'pausa', 'cancelado'])
            ]
        ]);

        $proyecto = new Proyecto($request->input());
        $proyecto->save();
        return redirect('proyectos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $data = $request->all();
        $proyecto ->update($data);
        return redirect('proyectos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return redirect('proyectos');
    }
}
