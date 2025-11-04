@extends('layouts.app')

@section('title', 'Notas de ' . $alumno->nombre)

@section('contenido')
    <div class="container py-5">
        <h3>Notas de: {{ $alumno->nombre }} ({{ $alumno->carnet }})</h3>
        <p>Correo: {{ $alumno->correo }}</p>

        <div class="card shadow mt-4">
            <div class="card-body">
                @if ($notas->isEmpty())
                    <p class="text-muted">El alumno no tiene notas registradas.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Materia</th>
                                    <th>Evaluación</th>
                                    <th>Nota</th>
                                    <th>Observaciones</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notas as $nota)
                                    <tr>
                                        <td>{{ $nota->matricula->materia->nombre }}</td>
                                        <td>{{ $nota->evaluacion ?? '-' }}</td>
                                        <td>{{ $nota->nota ?? '-' }}</td>
                                        <td>{{ $nota->observaciones ?? '-' }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{ route('notas.editar', $nota->id) }}">
                                                Editar
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
