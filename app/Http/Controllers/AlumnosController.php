<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;


class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $alumnos = Alumno::all();
        return view('app.recepcion.alumnos', compact('alumnos'));
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

        // Validación de los datos
        $validatedData = $request->validate([
            'nombre_alumno' => 'required|string|max:255',
            'nombre_correo' => 'required|email|unique:alumnos,correo',
            'telefono_alumno' => 'nullable|string|max:20',
            'nombre_padres' => 'nullable|string|max:255',
            'telefono_padres' => 'nullable|string|max:20',
            'tracking' => 'required|string|unique:alumnos,carnet', // usar tracking como carnet
        ]);

        // Crear el alumno usando los campos del formulario
        Alumno::create([
            'nombre' => $validatedData['nombre_alumno'],
            'correo' => $validatedData['nombre_correo'],
            'telefono' => $validatedData['telefono_alumno'],
            'nombre_responsable' => $validatedData['nombre_padres'] ?? null,
            'telefono_responsable' => $validatedData['telefono_padres'] ?? null,
            'carnet' => $validatedData['tracking'],
        ]);

        // Redirige de vuelta a la página de recepción con un mensaje
        return redirect()->route('recepcion')->with('success', 'Alumno creado con éxito');
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
