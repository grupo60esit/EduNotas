<?php

namespace App\Http\Controllers\Recepcion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materia;
class RecepcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       $materias = Materia::all();
        return view('app.recepcion.index',compact('materias'));
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
        'nombre' => 'required|string',

    ]);

    $paquete = Paquete::create([
        'nombre' => $request->nombre,

    ]);
       // Guardar en BD

    //return redirect()->route('recepcion.paquetesingresados')->with('success', '✅ Paquete registrado correctamente: ' . $paquete->tracking);
      // Redirigir a la vista de la etiqueta para imprimir
   // return redirect()->route('alumno.show', $paquete->tracking);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



 }
