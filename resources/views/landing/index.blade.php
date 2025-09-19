<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colegio Edunotas - Landing</title>

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
        }

        /* Hero principal */
        .hero {
            background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.6), rgba(33, 33, 33, 0.6)),
                url("https://images.unsplash.com/photo-1598966733521-6a18d1bb6a4c") center/cover no-repeat;
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            text-align: center;
            flex-direction: column;
            justify-content: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .carousel-item i {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .btn-success {
            font-weight: bold;
            border-radius: 30px;
            padding: 10px 30px;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 12px rgba(40, 167, 69, 0.5);
        }

        section {
            padding: 80px 0;
        }

        .service-card {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.2);
        }

        footer {
            background: #212529;
            color: #bbb;
            padding: 30px 0;
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
            <a class="navbar-brand fw-bold text-success" href="#">Colegio Edunotas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#nosotros">Sobre Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#actividades">Actividades</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-sm btn-outline-success ms-2"
                            href="{{ route('consulta.form') }}">Consulta Notas</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-sm btn-outline-success ms-2"
                            href="{{ route('login') }}">Administración</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero con carrusel de materias -->
    <header class="hero">
        <div class="container" data-aos="fade-up">
            <h1 class="mb-4"><span class="text-success">Colegio Edunotas</span><br> Educación de Calidad</h1>
            <p class="lead mb-4">Formamos estudiantes comprometidos y responsables.</p>
            <a href="{{ route('consulta.form') }}" class="btn btn-success btn-lg mt-3">Consulta tus Notas</a>

            <div id="carouselMaterias" class="carousel slide mt-5" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active text-center">
                        <i class="fa-solid fa-book-open text-success"></i>
                        <h5>Matemáticas</h5>
                        <p>Desarrollamos el pensamiento lógico y habilidades numéricas.</p>
                    </div>

                    <div class="carousel-item text-center">
                        <i class="fa-solid fa-flask text-success"></i>
                        <h5>Ciencias</h5>
                        <p>Exploramos la naturaleza y el mundo a través de experimentos y prácticas.</p>
                    </div>

                    <div class="carousel-item text-center">
                        <i class="fa-solid fa-paint-brush text-success"></i>
                        <h5>Arte</h5>
                        <p>Fomentamos la creatividad y expresión artística en todas las edades.</p>
                    </div>

                    <div class="carousel-item text-center">
                        <i class="fa-solid fa-futbol text-success"></i>
                        <h5>Deportes</h5>
                        <p>Promovemos hábitos saludables y trabajo en equipo.</p>
                    </div>

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselMaterias"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselMaterias"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </header>

    <!-- Sección Nosotros -->
    <section id="nosotros">
        <div class="container text-center" data-aos="fade-right">
            <h2 class="fw-bold mb-4">¿Quiénes Somos?</h2>
            <p class="text-muted mt-3">En <b>Colegio Edunotas</b> brindamos educación integral con enfoque en valores,
                innovación y excelencia académica.</p>
        </div>
    </section>

    <!-- Sección Actividades -->
    <section id="actividades" class="bg-light">
        <div class="container text-center">
            <h2 class="fw-bold" data-aos="fade-up">Nuestras Actividades</h2>
            <div class="row mt-5 g-4">
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="service-card">
                        <i class="fa-solid fa-book-open fa-3x text-success mb-3"></i>
                        <h5>Clases Académicas</h5>
                        <p>Programas completos para todas las edades y niveles.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="service-card">
                        <i class="fa-solid fa-paint-brush fa-3x text-success mb-3"></i>
                        <h5>Arte y Creatividad</h5>
                        <p>Fomentamos la expresión artística y actividades culturales.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-card">
                        <i class="fa-solid fa-futbol fa-3x text-success mb-3"></i>
                        <h5>Deportes</h5>
                        <p>Promovemos hábitos saludables y trabajo en equipo.</p>
                    </div>
                </div>
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
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>

</body>

</html>
