@extends('layouts.app')
@section('title', 'Agregar Materia a Alumno')
@section('contenido')

    <style>
        /* Ocultar sin romper accesibilidad (estilo recomendado) */


        /* Opcional: más feedback visual al pasar/seleccionar */
        .btn-toggle-label {
            cursor: pointer;
            transition: transform .06s ease, box-shadow .06s ease;
        }

        .btn-toggle-label:hover {
            transform: translateY(-2px);
        }

        .btn-toggle-label.active {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
    </style>
    <div class="container py-5">
        <div class="card shadow mx-auto" style="max-width: 800px;">
            <div class="card-body">

                <h4 class="text-center mb-4">Registrar Notas a Alumnos</h4>


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
                    <input type="text" class="form-control" value="{{ $alumno->correo }}" readonly>
                </div>


                @if ($materiasDisponibles->isEmpty())
                    <div class="alert alert-info text-center">
                        Todas las materias ya tienen nota registrada. ✅
                    </div>
                @else
                    <form method="POST" action="{{ route('notas.guardar', $alumno->carnet) }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Materia</label>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($materiasDisponibles as $materia)
                                    <input type="radio" class="btn-check" name="materia_id"
                                        id="materia_{{ $materia->id }}" value="{{ $materia->id }}" required>
                                    <label class="btn btn-outline-info rounded-pill px-3" for="materia_{{ $materia->id }}">
                                        {{ $materia->nombre }}
                                    </label>
                                @endforeach
                            </div>
                            <small class="text-muted d-block mt-1">Seleccione la materia para calificar</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nota</label>
                            <div class="d-flex flex-wrap gap-2">
                                @for ($i = 1; $i <= 10; $i++)
                                    <input type="radio" class="btn-check" name="nota" id="nota_{{ $i }}"
                                        value="{{ $i }}" required>
                                    <label class="btn btn-outline-primary rounded-pill px-3"
                                        for="nota_{{ $i }}">
                                        {{ $i }}
                                    </label>
                                @endfor
                            </div>
                            <small class="text-muted d-block mt-1">Seleccione una nota del 1 al 10</small>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_inicio" class="form-label">Fecha de calificación</label>
                            <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" required
                                readonly>
                        </div>

                        <button type="submit" class="btn btn-success">Registrar Nota</button>
                    </form>
                @endif

            </div>
        </div>

        <script>
            // Establecer la fecha actual como valor predeterminado en el campo de fecha
            document.getElementById('fecha_inicio').value = new Date().toISOString().split('T')[0];
        </script>
        <!-- JS: fallback para añadir/remover .active en las labels (asegura el estilo visual) -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inicializar clases active según radios chequeados al cargar
                document.querySelectorAll('input.btn-check').forEach(function(input) {
                    const label = document.querySelector('label[for="' + input.id + '"]');
                    if (!label) return;
                    if (input.checked) label.classList.add('active');

                    // Al cambiar un radio del mismo name, actualizamos todas las labels relacionadas
                    input.addEventListener('change', function() {
                        const name = input.name;
                        document.querySelectorAll('input[name="' + name + '"]').forEach(function(r) {
                            const lbl = document.querySelector('label[for="' + r.id + '"]');
                            if (!lbl) return;
                            if (r.checked) lbl.classList.add('active');
                            else lbl.classList.remove('active');
                        });
                    });
                });
            });
        </script>

    @endsection
