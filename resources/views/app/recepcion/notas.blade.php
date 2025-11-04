@extends('layouts.app')

@section('title', 'usuarios')

@section('contenido')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Administración de Notas</h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Notas de Alumnos</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-light">
                            <tr>
                                <th>Carnet</th>
                                <th>Nombre</th>
                                <th>Materia</th>
                                <th>Notas</th>
                                <th>Estado</th>

                            </tr>
                        </thead>
                       <tbody></tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "pageLength": 5,
                "lengthMenu": [20,50,20,10,10],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                }
            });
        });
    </script>
@endsection
@endsection
