<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Notas - Colegio Edunotas</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">

    <!-- AOS Animations -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            height: 100vh;
            background: #f8f9fa;
        }

        /* Sección protagonista */
        .hero-consulta {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url("https://images.unsplash.com/photo-1598966733521-6a18d1bb6a4c") center/cover no-repeat;
            text-align: center;
        }

        .card-consulta {
            border-radius: 20px;
            box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.25);
            padding: 40px 30px;
            /* más grande que antes */
            background: #fff;
            width: 100%;
            max-width: 800px;
            /* más ancho en pantallas grandes */
        }

        .card-consulta input.form-control-lg {
            font-size: 1.2rem;
            padding: 12px 15px;
        }

        .btn-success.btn-lg {
            font-size: 1.2rem;
            padding: 12px 25px;
        }

        .btn-success:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 12px rgba(40, 167, 69, 0.5);
        }

        table th,
        table td {
            text-align: center;
        }

        .nota-aprobada {
            color: #28a745;
            font-weight: bold;
        }

        .nota-reprobada {
            color: #dc3545;
            font-weight: bold;
        }

        #loader {
            display: none;
        }

        footer {
            background: #212529;
            color: #bbb;
            padding: 20px 0;
        }

        footer a {
            color: #28a745;
            margin: 0 10px;
            font-size: 1.2rem;
            transition: 0.3s;
        }

        footer a:hover {
            color: white;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-success" href="/">Colegio Edunotas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/">Principal</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-sm btn-outline-success ms-2"
                            href="{{ route('login') }}">Administración</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Sección Consulta -->
    <section class="hero-consulta">
        <div class="card card-consulta" data-aos="fade-up">
            <h2 class="mb-4">Consulta tus Notas</h2>
            <p class="text-muted mb-4">Ingresa tu carnet y correo para ver tus calificaciones al instante.</p>

            <form id="filtroForm" class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="carnet" class="form-control form-control-lg" placeholder="Carnet"
                        required>
                </div>
                <div class="col-md-6">
                    <input type="email" name="correo" class="form-control form-control-lg" placeholder="Correo"
                        required>
                </div>
                <div class="col-12 d-grid">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fa-solid fa-magnifying-glass"></i> Ver Notas
                    </button>
                </div>
            </form>

            <!-- Loader -->
            <div id="loader" class="text-center my-3">
                <div class="spinner-border text-success" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>

            <!-- Tabla de resultados -->
            <div id="tablaNotas" class="mt-4 animate__animated">
                {{-- Tabla se llenará vía AJAX --}}
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p>&copy; 2025 Colegio Edunotas | Desarrollado por DM503</p>
            <div>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="+5037777777"><i class="fab fa-whatsapp"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        $('#filtroForm').submit(function(e) {
            e.preventDefault();

            const tabla = $('#tablaNotas');
            const loader = $('#loader');

            tabla.html('');
            loader.show();

            $.ajax({
                url: "{{ route('notas.alumnoPublico') }}",
                method: "POST",
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    loader.hide();

                    if (response.error) {
                        tabla.html(
                            `<div class="alert alert-warning text-center">${response.message}</div>`
                        );
                        return;
                    }

                    let html = `<table class="table table-bordered table-striped">
                    <thead class="table-success">
                        <tr>
                            <th>Materia</th>
                            <th>Nota</th>
                            <th>Observación</th>
                        </tr>
                    </thead>
                    <tbody>`;

                    response.forEach(n => {
                        let clase = n.nota >= 7 ? 'nota-aprobada' : 'nota-reprobada';
                        let observacion = n.nota >= 7 ? 'Aprobada' : 'Reprobada';

                        html += `<tr>
                        <td>${n.matricula.materia.nombre}</td>
                        <td class="${clase}">${n.nota}</td>
                        <td class="${clase}">${observacion}</td>
                    </tr>`;
                    });

                    html += '</tbody></table>';
                    tabla.html(html);
                },
                error: function() {
                    loader.hide();
                    tabla.html(
                        '<div class="alert alert-danger text-center">Ocurrió un error al consultar las notas.</div>'
                    );
                }
            });
        });
    </script>

</body>

</html>
