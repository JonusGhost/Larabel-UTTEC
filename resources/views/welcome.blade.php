<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospital Lindas Sonrisas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Poppins:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #c3cfe2, #c3cfe2);
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header {
            background: linear-gradient(to right, #0044cc, #00aaff); /* Degradado azul */
            color: #fff;
            padding: 20px;
            width: 100%;
            text-align: center;
            text-shadow: 0 0 10px #00f, 0 0 20px #00f, 0 0 30px #00f;
        }
        .header h1 {
            font-size: 2.5rem;
            margin: 0;
            font-weight: 600;
        }
        .nav-links a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .nav-links a:hover {
            background-color: #0033aa;
            color: #f5f7fa;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 20px;
            text-align: center;
        }
        .btn {
            display: inline-block;
            margin: 20px;
            padding: 15px 30px;
            font-size: 1rem;
            color: #fff;
            background-color: #0044cc;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 0 10px #00f, 0 0 20px #00f, 0 0 30px #00f;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .btn:hover {
            background-color: #0033aa;
            box-shadow: 0 0 10px #005eff, 0 0 20px #005eff, 0 0 30px #005eff;
        }
        .carousel-container {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding: 20px 0;
        }
        .carousel {
            display: flex;
            width: 200%; /* Ajustar para mostrar todas las imágenes en el carrusel */
            animation: scroll 30s linear infinite;
        }
        .carousel img {
            width: 20%; /* Ajustar el ancho de las imágenes para que se acomoden en el carrusel */
            height: auto; /* Mantener la proporción de la imagen */
            object-fit: cover; /* Ajusta la imagen para que cubra el contenedor sin deformarse */
            border-radius: 10px;
        }
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); } /* Ajuste para una transición más suave */
        }
        .video-container {
            margin: 50px 0;
        }
        .video-container h3 {
            font-size: 1.5rem;
            text-shadow: 0 0 10px #00f, 0 0 20px #00f, 0 0 30px #00f;
        }
        .footer {
            background-color: #0044cc;
            color: #fff;
            padding: 20px;
            text-align: center;
            text-shadow: 0 0 10px #00f, 0 0 20px #00f, 0 0 30px #00f;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <h1>BIENVENIDO A HOSPITAL LINDAS SONRISAS</h1>
            @if (Route::has('login'))
                <nav class="nav-links">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn">Register</a>
                        @endif
                    @endauth
                    <a href="{{ url('/auth/redirect') }}" class="btn">
        <img src="{{ asset('images/imgGoogle.png') }}" alt="Google Logo" class="google-logo">
        Iniciar sesión con Google
    </a>

                </nav>
            @endif
        </div>
    </header>

    <main class="container">
        <h2>HOSPITAL LINDAS SONRISAS</h2>
        <p>Por favor, inicie sesión o regístrese para acceder a su cuenta y utilizar nuestros servicios.</p>
        
        <!-- Carrusel de Imágenes -->
        <div class="carousel-container">
            <div class="carousel">
                <img src="{{ asset('images/doctor1.jpeg') }}" alt="Imagen de Doctor 1">
                <img src="{{ asset('images/doctor3.jpg') }}" alt="Imagen de Doctor 3">
                <img src="{{ asset('images/doctor4.jpg') }}" alt="Imagen de Doctor 4">
                <img src="{{ asset('images/doctor5.jpg') }}" alt="Imagen de Doctor 5">
                <!-- Repetir imágenes para un ciclo continuo -->
                <img src="{{ asset('images/doctor1.jpeg') }}" alt="Imagen de Doctor 1">
                <img src="{{ asset('images/doctor3.jpg') }}" alt="Imagen de Doctor 3">
                <img src="{{ asset('images/doctor4.jpg') }}" alt="Imagen de Doctor 4">
                <img src="{{ asset('images/doctor5.jpg') }}" alt="Imagen de Doctor 5">
            </div>
        </div>

        <!-- Video -->
        <div class="video-container">
            <h3>Conozca nuestras instalaciones</h3>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/aK146sAFYgU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </main>

    <footer class="footer">
        <p>&copy; 2024 Hospital Lindas Sonrisas. Todos los derechos reservados.</p>
        <p><a href="{{ route('privacy') }}" style="color: red;">Políticas de Privacidad</a></p>

</body>

</html>