<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Models\Paquete;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $CantidadPaquetes = Paquete::where('estatus', 'recepcionado')->count();
        $alumnoMatriculados = Alumno::count();
        return view('app.dashboardGeneral', compact('CantidadPaquetes', 'alumnoMatriculados'));
    }
}
