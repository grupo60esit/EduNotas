@extends('layouts.app')
@section('title', 'Agregar Materia a Alumno')
@section('contenido')
    <div class="container py-5">
        <div class="card shadow mx-auto" style="max-width: 800px;">
            <div class="card-body">

                <h4 class="text-center mb-4">Agregar Materia a Alumno</h4>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Datos del Alumno (solo lectura) -->
                <div class="mb-3">
                    <label class="form-label">Carnet</label>
                    <input type="text" class="form-control" value="{{ $alumno->carnet }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" value="{{ $alumno->nombre }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Correo</label>
                    <input type="email" class="form-control" value="{{ $alumno->correo }}" readonly>
                </div>



                @if ($materiasDisponibles->isEmpty())
                    <p class="text-danger">El alumno ya está matriculado en todas las materias disponibles.</p>
                @else
                    <form method="POST" action="{{ route('alumnos.guardarMateria', $alumno->carnet) }}">
                        @csrf

                        <div class="mb-3">
                            <label for="materia_id" class="form-label">Materia</label>
                            <select class="form-select" id="materia_id" name="materia_id" required>
                                <option value="">Seleccione...</option>
                                @foreach ($materiasDisponibles as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Seleccione la materia para matricular</small>
                        </div>

                        <div class="mb-3">
                            <label for="tipo_matricula" class="form-label">Tipo de Matrícula</label>
                            <select name="tipo_matricula" id="tipo_matricula" class="form-select" required>
                                <option value="">Seleccione...</option>
                                <option>Presencial</option>
                                <option>En línea</option>
                            </select>
                        </div>



                        <div class="mb-3">
                            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
                        </div>

                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select" name="estado" id="estado" required>
                                <option value="pendiente">Nuevo</option>
                                <option value="activa">Activa</option>
                                <option value="finalizada">Finalizada</option>
                                <option value="cancelada">Cancelada</option>
                            </select>
                        </div>



                        <button type="submit" class="btn btn-success">Asignar Materia</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Establecer la fecha actual como valor predeterminado en el campo de fecha
        document.getElementById('fecha_inicio').value = new Date().toISOString().split('T')[0];
    </script>
@endsection
