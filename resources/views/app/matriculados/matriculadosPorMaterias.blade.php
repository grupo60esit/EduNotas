@extends('layouts.app')
@section('title', 'Edunotas Alumnos por Materia')
@section('contenido')
    <div class="container py-5">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Alumnos por Materia</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Distribución de Alumnos por Materia</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>

                                        <th class="text-center">Número de Alumnos</th>
                                        <th class="text-center">Materias Inscritas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumnosPorMateria as $alumno)
                                        <tr>
                                            <td class="text-center">
                                                <strong>{{ $alumno->nombre }}</strong><br>
                                                <small>{{ $alumno->correo }}</small><br>
                                                <a class="btn btn-success bt-sm"
                                                    href="{{ route('notas.alumno', $alumno->carnet) }}">Ver
                                                    Notas</a>
                                            </td>
                                            <td class="text-center">
                                                @if ($alumno->materias->isEmpty())
                                                    <span class="text-muted">No tiene materias inscritas</span>
                                                @else
                                                    <ol class="mb-0 list-unstyled">
                                                        @foreach ($alumno->materias as $materia)
                                                            <li>
                                                                <span class="materia-hover">
                                                                    {{ $materia->nombre }} ({{ $materia->codigo }})
                                                                </span>
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
