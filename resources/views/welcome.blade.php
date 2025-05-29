<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Juega Ya - Portal de Videojuegos</title>

    <!-- Fuente gamer pixel -->
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet" />

    <style>
        /* Reset básico */
        * {
            margin: 0; padding: 0; box-sizing: border-box;
        }

        body {
            background: radial-gradient(circle at center, #0b0c10, #1f2833);
            font-family: 'Press Start 2P', cursive;
            color: #00ff99;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1rem;
        }

        nav {
            width: 100%;
            max-width: 1100px;
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            padding: 1rem 0;
        }

        nav a {
            text-decoration: none;
            color: #00ff99;
            border: 2px solid #00ff99;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: 0.3s;
            font-size: 0.8rem;
        }

        nav a:hover {
            background-color: #00ff99;
            color: #0b0c10;
            box-shadow: 0 0 10px #00ff99;
        }

        header {
            text-align: center;
            margin: 2rem 0 3rem 0;
            max-width: 700px;
        }

        header h1 {
            font-size: 2.8rem;
            text-shadow:
                0 0 8px #00ff99,
                0 0 20px #00ff99,
                0 0 30px #00ff99;
            animation: flicker 2.5s infinite alternate;
        }

        header p {
            margin-top: 1rem;
            font-size: 1rem;
            color: #55ffaa;
            text-shadow: 0 0 10px #55ffaa;
        }

        main {
            max-width: 1100px;
            width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(300px,1fr));
            gap: 2rem;
            padding-bottom: 4rem;
        }

        section {
            background: #141a1f;
            border: 2px solid #00ff99;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 0 10px #00ff99aa;
            transition: transform 0.3s ease;
        }

        section:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px #00ff99;
        }

        section h2 {
            margin-bottom: 1rem;
            font-size: 1.3rem;
            color: #00ff99;
            text-shadow: 0 0 5px #00ff99;
        }

        section ul {
            list-style: none;
            color: #00ff99cc;
        }

        section ul li {
            margin-bottom: 0.6rem;
            cursor: pointer;
            transition: color 0.3s;
        }

        section ul li:hover {
            color: #00ff99;
            text-shadow: 0 0 8px #00ff99;
        }

        footer {
            margin-top: auto;
            padding: 1rem;
            color: #008050;
            font-size: 0.8rem;
            text-align: center;
        }

        /* Animación flicker */
        @keyframes flicker {
            0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
                opacity: 1;
            }
            20%, 24%, 55% {
                opacity: 0.6;
            }
        }

        /* Responsive ajustes */
        @media (max-width: 600px) {
            header h1 {
                font-size: 1.8rem;
            }

            nav {
                justify-content: center;
                gap: 0.5rem;
            }

            nav a {
                font-size: 0.7rem;
                padding: 0.4rem 0.7rem;
            }
        }
    </style>
</head>
<body>

<nav>
    @auth
        <a href="{{ url('/dashboard') }}">Panel</a>
    @else
        <a href="{{ route('login') }}">Iniciar sesión</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}">Registrarse</a>
        @endif
    @endauth
</nav>

<header>
    <h1>JUEGA YA</h1>
    <p>Tu portal para todo tipo de videojuegos: retro, arcade, y modernos</p>
</header>

<main>
    <section>
        <h2>🎮 Juegos Retro</h2>
        <ul>
            <li>Pong</li>
            <li>Pac-Man</li>
            <li>Super Mario Bros.</li>
            <li>Street Fighter II</li>
            <li>Donkey Kong</li>
        </ul>
    </section>

    <section>
        <h2>🕹️ Juegos Arcade</h2>
        <ul>
            <li>Space Invaders</li>
            <li>Galaga</li>
            <li>Ms. Pac-Man</li>
            <li>Asteroids</li>
            <li>Metal Slug</li>
        </ul>
    </section>

    <section>
        <h2>🚀 Juegos Modernos</h2>
        <ul>
            <li>Fortnite</li>
            <li>Minecraft</li>
            <li>League of Legends</li>
            <li>Among Us</li>
            <li>Cyberpunk 2077</li>
        </ul>
    </section>
</main>

<footer>
    &copy; 2025 Juega Ya. Todos los derechos reservados.
</footer>

</body>
</html>
