@extends('layouts.app')

@section('title', 'Editar Alumno')

@section('contenido')
    <div class="container py-5">
        <div class="card shadow mx-auto" style="max-width: 800px;">
            <div class="card-body">
                <h4 class="text-center mb-4">Editar Alumno</h4>

                <form method="POST" action="{{ route('alumnos.update', $alumno->carnet) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Carnet</label>
                        <input type="text" class="form-control" value="{{ $alumno->carnet }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre_alumno" class="form-control" value="{{ $alumno->nombre }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" name="correo_alumno" class="form-control" value="{{ $alumno->correo }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" name="telefono_alumno" class="form-control" value="{{ $alumno->telefono }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre Responsable</label>
                        <input type="text" name="nombre_padres" class="form-control"
                            value="{{ $alumno->nombre_responsable }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teléfono Responsable</label>
                        <input type="text" name="telefono_padres" class="form-control"
                            value="{{ $alumno->telefono_responsable }}">
                    </div>

                    <button type="submit" class="btn btn-success">Actualizar Alumno</button>
                </form>
            </div>
        </div>
    </div>
@endsection
