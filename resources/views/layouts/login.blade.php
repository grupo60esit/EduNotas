<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- ¡Clave para el diseño responsive! -->
    <title>Login</title>
    <link rel="shortcut icon" href="{{ asset('faviconEdunotas.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('faviconEdunotas.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #195231, #000000); /* Amarillo dorado a negro */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #000; /* texto negro por defecto */
            margin: 0;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.7);
            animation: fadeIn 0.6s ease-in-out;
            background-color: #fff;
            color: #000;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-primary {
            background-color: #195231; /* amarillo */
            color: #000;
            border: none;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #195231; /* amarillo más oscuro */
            color: #000;
            transform: scale(1.03);
        }

        .logo-circle {
            width: 80px;
            height: 80px;
            background: #000; /* negro */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0px 4px 12px rgba(16, 105, 28, 0.6); /* sombra amarilla */
        }

        .logo-circle i {
            font-size: 40px;
            color: #195231; /* amarillo */
        }

        .text-dark {
            color: #000 !important;
        }

        .text-muted {
            color: #444 !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 col-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <!-- Logo -->
                        <div class="logo-circle">

                            <img src="{{ asset('faviconEdunotas.ico') }}" alt="">
                        </div>

                        <!-- Título -->
                        <div class="text-center mb-4">
                            <h1 class="h4 text-dark fw-bold">App eduNotas</h1>
                            <p class="text-muted">Accede con tus credenciales</p>
                        </div>

                        <!-- Errores -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Formulario -->
                        <form class="user" action="{{ route('login.post') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="email"
                                       name="email" placeholder="ejemplo@correo.com" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password"
                                       name="password" placeholder="********" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-sign-in-alt"></i> Ingresar
                            </button>
                            <a href="{{ route('landing') }}" style="color: gray;">Regresar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


