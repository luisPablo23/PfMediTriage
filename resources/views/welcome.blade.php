<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediTriage - Sistema de Triaje Médico</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/welcome.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-lg px-4">
        <a class="navbar-brand text-white fw-bold" href="#"><i class="bi bi-heart-pulse-fill me-2"></i>MediTriage</a>
        <div class="ms-auto">
            <a href="https://www.facebook.com" class="nav-link d-inline" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="https://www.twitter.com" class="nav-link d-inline" target="_blank"><i class="bi bi-twitter"></i></a>
            <a href="https://www.instagram.com" class="nav-link d-inline" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com" class="nav-link d-inline" target="_blank"><i class="bi bi-linkedin"></i></a>
        </div>
    </nav>

    <section class="hero d-flex align-items-center justify-content-center text-center py-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="fw-bold text-white">Bienvenido a MediTriage</h1>
                    <p class="lead text-white-50">El sistema inteligente de triaje médico diseñado para priorizar la atención de pacientes con eficiencia, rapidez y precisión.</p>
                    <a href="{{ route('login') }}" class="btn btn-white me-2 mb-2"><i class="bi bi-box-arrow-in-right me-1"></i> Ingresar</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light mb-2"><i class="bi bi-person-plus me-1"></i> Registrarse</a>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="/images/portada.png" alt="Equipo médico" class="img-fluid" style="max-height: 440px;">
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center text-white-50 py-3">
        &copy; {{ date('Y') }} MediTriage · Todos los derechos reservados.
    </footer>

</body>
</html>