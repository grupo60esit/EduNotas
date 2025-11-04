<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Materia;
use App\Models\Matricula;
use App\Models\Nota;

class NotasController extends Controller
{
    // Mostrar todos los alumnos
    public function index()
    {
        $alumnos = Alumno::with('matriculas.materia')->get(); 
        return view('app.notas.alumnonotas', compact('alumnos'));
    }

    // Formulario para agregar nota a un alumno
    public function agregarNota($carnet)
    {
        $alumno = Alumno::where('carnet', $carnet)->firstOrFail();

          // Obtener IDs de las materias que ya tienen nota
    $materiasConNota = Nota::whereIn('matricula_id', $alumno->matriculas()->pluck('id'))
                            ->pluck('matricula_id')
                            ->toArray();

         // Obtener las materias disponibles que no tengan nota
    $materiasDisponibles = $alumno->matriculas()->with('materia')->get()
        ->filter(function($matricula) use ($materiasConNota) {
            return !in_array($matricula->id, $materiasConNota);
        })
        ->map(function($matricula){
            return $matricula->materia;
        });

        return view('app.notas.alumnosAgregarNotas', compact('alumno', 'materiasDisponibles'));
    }

    // Guardar o actualizar la nota
    public function guardarNota(Request $request, $carnet)
    {
        $request->validate([
            'materia_id' => 'required|exists:materias,id',
            'nota' => 'required|numeric|min:1|max:10',
        
        ]);

        $alumno = Alumno::where('carnet', $carnet)->firstOrFail();

        // Buscar matrícula del alumno y materia
        $matricula = Matricula::where('alumno_id', $alumno->id)
                              ->where('materia_id', $request->materia_id)
                              ->firstOrFail();

        // Verificar si ya existe nota
        $notaExistente = Nota::where('matricula_id', $matricula->id)->first();

        if($notaExistente) {
            $notaExistente->update([
                'nota' => $request->nota,
                'evaluacion' => $request->evaluacion ?? 'Nota Final',
                'observaciones' => $request->observaciones ?? null
            ]);
            $mensaje = 'Nota actualizada correctamente';
        } else {
            Nota::create([
                'matricula_id' => $matricula->id,
                'nota' => $request->nota,
                'evaluacion' => $request->evaluacion ?? 'Nota Final',
                'observaciones' => $request->observaciones ?? null
            ]);
            $mensaje = 'Nota registrada correctamente';
        }

        return redirect()->route('notas.lista', $alumno->carnet)
                         ->with('success', $mensaje);
    }

    public function listaNotas()
    {
        $notas = Nota::with(['matricula.alumno', 'matricula.materia'])->get();
        return view('app.notas.listaNotasAlumnos', compact('notas'));
    }

 

public function notasPorAlumno(Request $request)
{
    $carnet = $request->input('carnet');
    $correo = $request->input('correo');

    // Buscar el alumno
    $alumno = Alumno::where('carnet', $carnet)
                     ->where('correo', $correo)
                     ->first();

    if (!$alumno) {
        return response()->json([
            'error' => true,
            'message' => 'No se encontraron notas para el carnet o correo ingresado.'
        ]);
    }

    // Obtener las notas del alumno
    $notas = Nota::with('matricula.materia')
                 ->whereHas('matricula', function($q) use ($alumno) {
                     $q->where('alumno_id', $alumno->id);
                 })
                 ->get();

    if ($notas->isEmpty()) {
        return response()->json([
            'error' => true,
            'message' => 'El alumno no tiene notas registradas.'
        ]);
    }

    return response()->json($notas);
}

// Mostrar formulario para editar una nota
public function editarNota($id)
{
    $nota = Nota::with('matricula.alumno', 'matricula.materia')->findOrFail($id);
    
    return view('app.notas.editarNota', compact('nota'));
}

public function notasAlumno($carnet)
{
    $alumno = Alumno::where('carnet', $carnet)->firstOrFail();

    // Obtener todas las notas del alumno con su materia
    $notas = Nota::with('matricula.materia')
                 ->whereHas('matricula', function($q) use ($alumno) {
                     $q->where('alumno_id', $alumno->id);
                 })
                 ->get();

    return view('app.notas.notasPorAlumno', compact('alumno', 'notas'));
}





}
