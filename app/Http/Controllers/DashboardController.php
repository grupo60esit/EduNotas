<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Models\Paquete;
use App\Models\Matricula;
use App\Models\Materia;
class DashboardController extends Controller
{
    //
    public function index()
    {

   // Traemos todos los alumnos con el conteo de matrículas
        $alumnos = Alumno::withCount('matriculas')->get();

        // Para la tarjeta: total de alumnos
        $totalAlumnos = $alumnos->count();

        // Para la tarjeta: total de matrículas (alumnos matriculados en cursos)
        $totalMatriculas = $alumnos->sum('matriculas_count');

        // Datos para gráfico: cantidad de alumnos por materia
        $materias = Materia::withCount('matriculas')->get();
        $materiaNombres = $materias->pluck('nombre'); // X
        $cantidadAlumnos = $materias->pluck('matriculas_count'); // Y

        return view('app.dashboardGeneral', compact(
            'totalAlumnos',
            'totalMatriculas',
            'materiaNombres',
            'cantidadAlumnos'
        ));
        
    }
}
