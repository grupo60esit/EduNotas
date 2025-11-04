<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('faviconEdunotas.ico') }}" type="image/x-icon">


    <link rel="shortcut icon" href="{{ asset('faviconEdunotas.ico') }}" type="image/x-icon">
    <!-- Bootstrap 4.6 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700,900" rel="stylesheet">

    <!-- SB Admin 2 CSS -->
    <link href="{{ asset('css/admin/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #etiquetaModal,
            #etiquetaModal * {
                visibility: visible;
            }

            #etiquetaModal {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            #etiquetaModal .modal-footer {
                display: none;
            }

            #etiquetaModal .modal-content {
                width: 10cm;
                height: 10cm;
            }
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="{{ route('index.dashboardGeneral') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-graduation-cap" style="color: #195231;"></i>
                </div>
                <div class="sidebar-brand-text mx-3" style="color: #195231;">EduNotas</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('index.dashboardGeneral') }}">
                    <i class="fa-solid fa-chart-line" style="color:#195231;"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">Panel Operativo</div>

            @auth
                @if (auth()->user()->hasRole(['admin']))
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRecepcion"
                            aria-expanded="false" aria-controls="collapseRecepcion">
                            <i class="fa-solid fa-bell-concierge" style="color: #63E6BE;"></i>
                            <span>Ventas</span>
                        </a>
                        <div id="collapseRecepcion" class="collapse" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Recepcion de Ordenes:</h6>
                                <a class="collapse-item" href="#">Crear Orden</a>
                                <a class="collapse-item" href="#">Ver Ordenes</a>

                            </div>
                        </div>
                    </li>
                @endif

                @if (auth()->user()->hasRole(['admin', 'supervisor']))
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBodega"
                            aria-expanded="false" aria-controls="collapseBodega">
                            <i class="fa-solid fa-book-open-reader" style="color: #63E6BE;"></i>
                            <span>Produccion</span>
                        </a>
                        <div id="collapseBodega" class="collapse" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Producion:</h6>
                                <a class="collapse-item" href="#">Asignar orden</a>
                                <a class="collapse-item" href="#">Tiempos estimados</a>
                                <a class="collapse-item" href="#">Ordenes en Proceso</a>
                            </div>
                        </div>
                    </li>
                @endif

                @if (auth()->user()->hasRole(['admin', 'supervisor']))
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRuteo"
                            aria-expanded="false" aria-controls="collapseRuteo">
                            <i class="fa-solid fa-clipboard" style="color: #63E6BE;"></i>
                            <span>Inventario</span>
                        </a>
                        <div id="collapseRuteo" class="collapse" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Inventario de Hilo:</h6>
                                <a class="collapse-item" href="#">Ver Material</a>

                            </div>
                        </div>
                    </li>
                @endif

                @if (auth()->user()->hasRole(['admin', 'supervisor']))
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse"
                            data-target="#collapseconfiguraciones" aria-expanded="false"
                            aria-controls="collapseconfiguraciones">
                            <i class="fa-solid fa-gear" style="color: #bdff24;"></i>
                            <span>Configuraciones</span>
                        </a>
                        <div id="collapseconfiguraciones" class="collapse" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Configuraciones:</h6>
                                <a class="collapse-item" href="#">Horarios</a>
                                <a class="collapse-item" href="#">Materias</a>
                                <a class="collapse-item" href="#">Medidas</a>
                                <a class="collapse-item" href="#">Codigo De hilos</a>
                            </div>
                        </div>
                    </li>
                @endif

                @if (auth()->user()->hasRole(['admin']))
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse"
                            data-target="#collapseAdministracion" aria-expanded="false"
                            aria-controls="collapseAdministracion">
                            <i class="fa-solid fa-user-gear" style="color: #f15d07;"></i>
                            <span>Administracion</span>
                        </a>
                        <div id="collapseAdministracion" class="collapse" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Administración:</h6>
                                <a class="collapse-item" href="{{ route('usuarios.index') }}">Usuarios</a>
                            </div>
                        </div>
                    </li>
                @endif
            @endauth

            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-info topbar mb-4 shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">



                        <!-- Nav Item - User Info -->
                        @auth
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <span class="mr-2 d-none d-lg-inline text-white small">
                                        {{ optional(Auth::user())->name }}
                                        <br>
                                    </span>

                                    @if (!empty(optional(Auth::user())->foto))
                                        <img class="img-profile rounded-circle" width="35" height="35"
                                            src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto Empleado">
                                    @else
                                        <i class="fa-solid fa-user-circle fa-2x text-gray-400"></i>
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('perfil') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Perfil
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Configuración
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <form class="bg-danger" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2  text-gray-400"></i>
                                            Cerrar Sesión
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">@yield('PasosProcesos')</h1>
                    @yield('contenido')
                </div>
                <!-- End Page Content -->

            </div>
            <!-- End Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="text-center my-auto">
                        <span>Copyright &copy; </span><br>
                        <small> pendiente</small>
                    </div>
                </div>
            </footer>
        </div>
        <!-- End Content Wrapper -->
    </div>
    <!-- End Wrapper -->

    <!-- Scroll to Top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap 4.6 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Otros scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/admin/sb-admin-2.min.js') }}"></script>
    <!-- En el <head> o antes de cerrar </body> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('scripts')
</body>

</html>
