@extends('layouts.app')

@section('title', 'Edunotas Lista de Notas')

@section('contenido')
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Lista de Notas de Alumnos</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Detalle de Notas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-light">
                            <tr>
                                <th>Carnet</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Materia</th>
                                <th>Evaluación</th>
                                <th>Nota</th>
                                <th>Materia Observacion</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notas as $nota)
                                <tr>
                                    <td>{{ $nota->matricula->alumno->carnet }}</td>
                                    <td>{{ $nota->matricula->alumno->nombre }}</td>
                                    <td>{{ $nota->matricula->alumno->correo }}</td>
                                    <td>{{ $nota->matricula->materia->nombre }}</td>
                                    <td>{{ $nota->evaluacion ?? '-' }}</td>
                                    <td>{{ $nota->nota ?? '-' }}</td>
                                    <td>
                                        @if ($nota->nota !== null)
                                            @if ($nota->nota >= 7)
                                                <span class="text-success">Aprobada</span>
                                            @else
                                                <span class="text-danger">Reprobada</span>
                                            @endif
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        <a class="btn btn-warning bt-sm"
                                            href="{{ route('notas.editar', $nota->id) }}">Editar</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Inicializar DataTables
            $('#dataTable').DataTable({
                "pageLength": 10,
                "lengthMenu": [10, 20, 50, 100],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                }
            });
        });

        // Mensajes SweetAlert2
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ session('error') }}'
                });
            @endif
        });
    </script>
@endsection
