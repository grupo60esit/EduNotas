@extends('layouts.app')
@section('title', 'Ingreso de Alumnos')
@section('contenido')
    <div class="container-fluid py-5">
        <div class="card shadow-lg mx-auto" style="max-width: 1200px;">
            <div class="card-body p-4">

                <h4 class="text-center mb-4">Formulario Ingreso Alumno</h4>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('alumnos.store') }}">
                    @csrf

                    <div class="row">
                        <!-- ================== Alumno ================== -->
                        <div class="col-md-6 mb-4">
                            <div class="card border-primary shadow-sm h-100">
                                <div class="card-header bg-primary text-white fw-bold">
                                    Datos del Alumno
                                </div>
                                <div class="card-body row">
                                    <div class="mb-3 col-12">
                                        <label for="nombre_alumno" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre_alumno" name="nombre_alumno"
                                            required>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="telefono_alumno" class="form-label">Teléfono</label>
                                        <input type="tel" class="form-control" id="telefono_alumno"
                                            name="telefono_alumno">
                                    </div>

                                    <div class="mb-3 col-12">
                                        <label for="correo_alumno" class="form-label">Correo</label>
                                        <input type="email" class="form-control" id="correo_alumno" name="correo_alumno"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ================== Padres ================== -->
                        <div class="col-md-6 mb-4">
                            <div class="card border-success shadow-sm h-100">
                                <div class="card-header bg-success text-white fw-bold">
                                    Datos del Padre
                                </div>
                                <div class="card-body row">
                                    <div class="mb-3 col-12">
                                        <label for="nombre_padres" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre_padres" name="nombre_padres">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="telefono_padres" class="form-label">Teléfono</label>
                                        <input type="tel" class="form-control" id="telefono_padres"
                                            name="telefono_padres">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================== Matrícula ================== -->
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card border-dark shadow-sm">
                                <div class="card-header bg-dark text-white fw-bold">
                                    Información de la matrícula
                                </div>
                                <div class="card-body row">
                                    <div class="mb-3 col-md-6">
                                        <label for="tipo_paquete" class="form-label">Tipo de Matrícula</label>
                                        <select class="form-select" id="tipo_paquete" name="tipo_paquete" required>
                                            <option value="">Seleccione</option>
                                            <option>Presencial</option>
                                            <option>En línea</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="destino" class="form-label">Materia</label>
                                        <select class="form-select" id="destino" name="destino" required>
                                            <option value="">Seleccione...</option>
                                            @foreach ($materias as $materia)
                                                <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="mb-3 col-md-6">
                                        <label for="fecha_recepcion" class="form-label">Fecha de Inicio</label>
                                        <input type="date" class="form-control" id="fecha_recepcion"
                                            name="fecha_recepcion" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="estatus" class="form-label">Estado</label>
                                        <select class="form-select" id="estatus" name="estatus" required>
                                            <option value="pendiente">Nuevo</option>
                                            <option value="activa">Activa</option>
                                            <option value="finalizada">Finalizada</option>
                                            <option value="cancelada">Cancelada</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de enviar -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-success">Registrar Matrícula</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Establecer la fecha actual como valor predeterminado en el campo de fecha
        document.getElementById('fecha_recepcion').value = new Date().toISOString().split('T')[0];
    </script>


@endsection
