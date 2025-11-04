@extends('layouts.app')

@section('title', 'Editar Nota')

@section('contenido')
    <div class="container py-5">
        <div class="card shadow mx-auto" style="max-width: 800px;">
            <div class="card-body">
                <h4 class="text-center mb-4">Editar Nota del Alumno</h4>

                <!-- Datos del Alumno -->
                <div class="mb-3">
                    <label class="form-label">Carnet</label>
                    <input type="text" class="form-control" value="{{ $nota->matricula->alumno->carnet }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" value="{{ $nota->matricula->alumno->nombre }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Materia</label>
                    <input type="text" class="form-control" value="{{ $nota->matricula->materia->nombre }}" readonly>
                </div>

                <form method="POST" action="{{ route('notas.guardar', $nota->matricula->alumno->carnet) }}">
                    @csrf
                    <input type="hidden" name="materia_id" value="{{ $nota->matricula->materia->id }}">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nota</label>
                        <div class="d-flex flex-wrap gap-2">
                            @for ($i = 1; $i <= 10; $i++)
                                <input type="radio" class="btn-check" name="nota" id="nota_{{ $i }}"
                                    value="{{ $i }}" {{ $nota->nota == $i ? 'checked' : '' }} required>
                                <label class="btn btn-outline-primary rounded-pill px-3" for="nota_{{ $i }}">
                                    {{ $i }}
                                </label>
                            @endfor
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Observaciones</label>
                        <textarea class="form-control" name="observaciones">{{ $nota->observaciones }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Actualizar Nota</button>
                </form>
            </div>
        </div>
    </div>
@endsection
