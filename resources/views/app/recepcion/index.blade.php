@extends('layouts.app')
@section('title', 'Recepcion de paquetes')
@section('contenido')
    <div class="container-fluid py-5">
        <div class="card shadow-lg mx-auto" style="max-width: 1200px;">
            <div class="card-body p-4">

                <h4 class="text-center mb-4">Formulario Ingreso Alumno</h4>

                <form method="POST" action="#">
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
                                        <label for="telefono_alumno" class="form-label">Teléfono</label>
                                        <input type="tel" class="form-control" id="telefono_alumno"
                                            name="telefono_alumno" required>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="nombre_alumno" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre_alumno" name="nombre_alumno"
                                            required>
                                    </div>
                                      <div class="mb-3 col-12">
                                        <label for="nombre_correo" class="form-label">Correo</label>
                                        <input type="text" class="form-control" id="nombre_correo" name="nombre_correo"
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
                                        <label for="telefono_padres" class="form-label">Teléfono</label>
                                        <input type="tel" class="form-control" id="telefono_padres"
                                            name="telefono_padres" required>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="nombre_padres" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre_padres" name="nombre_padres"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================== Matriculo ================== -->
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card border-dark shadow-sm">
                                <div class="card-header bg-dark text-white fw-bold">
                                    Información de la matricula
                                </div>
                                <div class="card-body row">

                                    <div class="mb-3 col-md-6">
                                        <label for="tipo_paquete" class="form-label">Tipo de Matricula</label>
                                        <select class="form-select" id="tipo_paquete" name="tipo_paquete">
                                             <option value="">Seleccione...</option>




                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="destino" class="form-label">Materia</label>
                                        <select class="form-select" id="destino" name="destino" required>
                                             <option value="">Seleccione...</option>
                                          @foreach ($materias as $materia )
                                                 <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="mb-3 col-md-6">
                                        <label for="costo_total" class="form-label">Precio</label>
                                        <input type="number" class="form-control" id="costo_total" name="costo_total"
                                            step="0.01">
                                    </div>






                                    <div class="mb-3 col-md-6">
                                        <label for="fecha_recepcion" class="form-label">Fecha de Inicio</label>
                                        <input type="date" class="form-control" id="fecha_recepcion"
                                            name="fecha_recepcion" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="estatus" class="form-label">Estado</label>
                                        <select class="form-select" id="estatus" name="estatus" required>
                                            <option class="" value="recepcionado">Nuevo</option>

                                        </select>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tracking generado automáticamente -->
                    <input type="hidden" name="tracking" value="{{ uniqid('TK') }}">



                    <!-- Botón de enviar -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-success">Registrar Matricula</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
