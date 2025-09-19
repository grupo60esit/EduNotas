<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Matricula;
use App\Models\Materia;

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
 $validatedData = $request->validate([
    'carnet' => 'nullable|string',
    'nombre_alumno' => 'required|string',
    'correo_alumno' => 'required|email',
    'telefono_alumno' => 'nullable|string',
    'nombre_padres' => 'nullable|string',
    'telefono_padres' => 'nullable|string',
    'tipo_paquete' => 'required|string',
    'destino' => 'required|exists:materias,id',
  
    'fecha_recepcion' => 'required|date',
    'estatus' => 'required|string'
]);

    // Buscar o crear alumno
    if(!empty($validatedData['carnet'])){
        $alumno = Alumno::firstOrCreate(
            ['carnet' => $validatedData['carnet']],
            [
                'nombre' => $validatedData['nombre_alumno'],
                'correo' => $validatedData['correo_alumno'],
                'telefono' => $validatedData['telefono_alumno'] ?? null,
                'nombre_responsable' => $validatedData['nombre_padres'] ?? null,
                'telefono_responsable' => $validatedData['telefono_padres'] ?? null,
            ]
        );
    } else {
        $alumno = Alumno::firstOrCreate(
            ['correo' => $validatedData['correo_alumno']],
            [
                'nombre' => $validatedData['nombre_alumno'],
                'telefono' => $validatedData['telefono_alumno'] ?? null,
                'nombre_responsable' => $validatedData['nombre_padres'] ?? null,
                'telefono_responsable' => $validatedData['telefono_padres'] ?? null,
            ]
        );
    }

    // Revisar si el alumno ya existía
    if(!$alumno->wasRecentlyCreated){
        return back()->with('error', 'El alumno ya existe, no se puede duplicar.')->withInput();
    }

    // Crear matrícula
    Matricula::create([
        'alumno_id' => $alumno->id,
        'materia_id' => $validatedData['destino'],
        'tipo_matricula' => $validatedData['tipo_paquete'],
       
        'fecha_inicio' => $validatedData['fecha_recepcion'],
        'estado' => $validatedData['estatus']
    ]);

    return redirect()->route('alumnos.index')->with('success', 'Alumno creado con éxito');
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
 // Mostrar formulario para editar alumno
public function edit($carnet)
{
    $alumno = Alumno::where('carnet', $carnet)->firstOrFail();
    return view('app.recepcion.editarAlumno', compact('alumno'));
}

    /**
     * Update the specified resource in storage.
     */
   // Actualizar alumno
public function update(Request $request, $carnet)
{
    $request->validate([
        'nombre_alumno' => 'required|string',
        'correo_alumno' => 'required|email',
        'telefono_alumno' => 'nullable|string',
        'nombre_padres' => 'nullable|string',
        'telefono_padres' => 'nullable|string',
    ]);

    $alumno = Alumno::where('carnet', $carnet)->firstOrFail();

    try {
        $alumno->fill([
            'nombre' => $request->nombre_alumno,
            'correo' => $request->correo_alumno,
            'telefono' => $request->telefono_alumno,
            'nombre_responsable' => $request->nombre_padres,
            'telefono_responsable' => $request->telefono_padres,
        ]);
        $alumno->save();
    } catch (\Illuminate\Database\QueryException $e) {
        return back()->with('error', 'No se pudo actualizar el alumno: ' . $e->getMessage());
    }

    return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function agregarMateria($carnet)
{
    // Buscar alumno por carnet
    $alumno = Alumno::where('carnet', $carnet)->firstOrFail();

    // Obtener los IDs de las materias que ya tiene
    $materiasAsignadasIds = $alumno->matriculas()->pluck('materia_id')->toArray();
// Obtener solo las materias que no están asignadas
    $materiasDisponibles = Materia::whereNotIn('id', $materiasAsignadasIds)->get();
// Obtener todas las materias disponible
  //  $materiasDisponibles = Materia::w('id', $carnet->materia_id)->get();

    return view('app.recepcion.alumnosAgregarMaterias', compact('alumno', 'materiasDisponibles'));
}

public function guardarMateria(Request $request, $carnet)
{
    $request->validate([
        'materia_id' => 'required|exists:materias,id',
        'tipo_matricula' => 'required|string',
    
        'fecha_inicio' => 'required|date',
        'estado' => 'required|string',
    ]);

    $alumno = Alumno::where('carnet', $carnet)->firstOrFail();

    // Crear matrícula
    Matricula::create([
        'alumno_id' => $alumno->id,
        'materia_id' => $request->materia_id,
        'tipo_matricula' => $request->tipo_matricula,
   
        'fecha_inicio' => $request->fecha_inicio,
        'estado' => $request->estado,
    ]);

    return redirect()->route('alumnos.index')->with('success', 'Materia asignada correctamente');


}

public function alumnosPorMateria()
{
   // Trae todas las materias con los alumnos inscritos en cada una
    $alumnosPorMateria = Alumno::with('materias')->get();

    return view('app.matriculados.matriculadosPorMaterias', compact('alumnosPorMateria'));  

}
}
