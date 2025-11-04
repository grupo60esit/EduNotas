@extends('layouts.app')

@section('title', 'Edunotas Alumnos')

@section('contenido')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Asignar Notas a Alumnos</h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Asignar Notas</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-light">
                            <tr>
                                <th>Carnet</th>
                                <th>Nombre</th>
                                <th>Correo</th>


                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumnos as $alumno)
                                <tr>
                                    <td>{{ $alumno->carnet }}</td>
                                    <td>{{ $alumno->nombre }}</td>
                                    <td>{{ $alumno->correo }}</td>

                                    <td>
                                        <a class="btn btn-success"
                                            href="{{ route('notas.agregar', $alumno->carnet) }}">Registrar Nota</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "pageLength": 25,
                "lengthMenu": [50, 50, 50],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                }
            });
        });
    </script>
@endsection
@endsection
