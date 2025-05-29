<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Juega Ya - Portal Gamer</title>

<!-- Fuente moderna + arcade -->
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />

<style>
  /* Reset */
  * {
    margin: 0; padding: 0; box-sizing: border-box;
  }

  body, html {
    height: 100%;
    font-family: 'Montserrat', sans-serif;
    background: radial-gradient(ellipse at center, #050505 0%, #0f2027 100%);
    overflow-x: hidden;
    color: #00fff7;
    position: relative;
  }

  /* Fondo animado de partículas */
  #particle-canvas {
    position: fixed;
    top:0; left:0; width: 100%; height: 100%;
    z-index: -1;
    background: linear-gradient(45deg, #060c1c 0%, #12032a 100%);
  }

  nav {
    max-width: 1200px;
    margin: 1rem auto;
    display: flex;
    justify-content: flex-end;
    gap: 1.5rem;
    padding: 0 1rem;
    font-weight: 700;
    letter-spacing: 1px;
  }

  nav a {
    color: #00fff7;
    text-decoration: none;
    padding: 0.5rem 1.2rem;
    border: 2px solid transparent;
    border-radius: 25px;
    transition: all 0.3s ease;
    font-size: 0.9rem;
    background: rgba(0,255,247,0.1);
    backdrop-filter: blur(6px);
    box-shadow: 0 0 6px #00fff7aa;
  }

  nav a:hover {
    border-color: #00fff7;
    box-shadow: 0 0 18px #00fff7cc;
    background: rgba(0,255,247,0.3);
    color: #fff;
  }

  header {
    max-width: 900px;
    margin: 4rem auto 3rem;
    text-align: center;
  }

  header h1 {
    font-family: 'Press Start 2P', cursive;
    font-size: 3.5rem;
    color: #00fff7;
    text-shadow:
      0 0 8px #00fff7,
      0 0 20px #00fff7,
      0 0 30px #00fff7,
      0 0 40px #00fff7;
    animation: flicker 3s infinite alternate ease-in-out;
  }

  header p {
    margin-top: 1rem;
    font-size: 1.2rem;
    font-weight: 600;
    color: #6ef7f2cc;
    letter-spacing: 1.3px;
    text-shadow: 0 0 8px #6ef7f2cc;
  }

  main {
    max-width: 1200px;
    margin: 0 auto 6rem;
    padding: 0 1rem;
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(280px,1fr));
    gap: 2.2rem;
  }

  section.card {
    background: rgba(0,255,247,0.1);
    border-radius: 15px;
    padding: 1.8rem 1.5rem;
    box-shadow:
      0 0 10px #00fff7bb,
      0 0 40px #00fff7aa inset;
    backdrop-filter: blur(10px);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    cursor: pointer;
  }

  section.card:hover {
    transform: translateY(-12px);
    box-shadow:
      0 0 20px #00fff7ff,
      0 0 60px #00fff7ff inset;
  }

  section.card h2 {
    font-family: 'Press Start 2P', cursive;
    font-size: 1.4rem;
    margin-bottom: 1rem;
    color: #00fff7;
    text-shadow: 0 0 12px #00fff7;
    user-select: none;
  }

  section.card ul {
    list-style: none;
  }

  section.card ul li {
    padding: 0.5rem 0;
    font-weight: 600;
    letter-spacing: 1px;
    color: #a4fff7cc;
    transition: color 0.3s;
  }

  section.card ul li:hover {
    color: #00fff7;
    text-shadow: 0 0 15px #00fff7;
  }

  footer {
    text-align: center;
    padding: 1rem 0;
    font-size: 0.8rem;
    letter-spacing: 0.1em;
    color: #007a7a99;
    user-select: none;
  }

  /* Animaciones */
  @keyframes flicker {
    0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
      opacity: 1;
      text-shadow:
        0 0 8px #00fff7,
        0 0 20px #00fff7,
        0 0 30px #00fff7,
        0 0 40px #00fff7;
    }
    20%, 24%, 55% {
      opacity: 0.6;
      text-shadow: none;
    }
  }

  @media (max-width: 600px) {
    header h1 {
      font-size: 2rem;
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
  @if(Route::has('register'))
    <a href="{{ route('register') }}">Registrarse</a>
  @endif
  @endauth
</nav>

<header>
  <h1>JUEGA YA</h1>
  <p>Explora todos los estilos: Retro, Arcade y Modernos. ¡El mundo gamer en un solo lugar!</p>
</header>

<main>
  <section class="card">
    <h2>🎮 Retro</h2>
    <ul>
      <li>Pong</li>
      <li>Pac-Man</li>
      <li>Super Mario Bros.</li>
      <li>Street Fighter II</li>
      <li>Donkey Kong</li>
    </ul>
  </section>

  <section class="card">
    <h2>🕹️ Arcade</h2>
    <ul>
      <li>Space Invaders</li>
      <li>Galaga</li>
      <li>Ms. Pac-Man</li>
      <li>Asteroids</li>
      <li>Metal Slug</li>
    </ul>
  </section>

  <section class="card">
    <h2>🚀 Modernos</h2>
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

<!-- Partículas animadas -->
<canvas id="particle-canvas"></canvas>
<script>
  const canvas = document.getElementById('particle-canvas');
  const ctx = canvas.getContext('2d');
  let width, height;

  function resize() {
    width = canvas.width = window.innerWidth;
    height = canvas.height = window.innerHeight;
  }
  window.addEventListener('resize', resize);
  resize();

  // Partículas
  class Particle {
    constructor() {
      this.x = Math.random()*width;
      this.y = Math.random()*height;
      this.radius = Math.random() * 1.5 + 0.5;
      this.speedX = (Math.random() - 0.5) * 0.5;
      this.speedY = (Math.random() - 0.5) * 0.5;
      this.opacity = Math.random();
    }
    update() {
      this.x += this.speedX;
      this.y += this.speedY;

      if (this.x < 0 || this.x > width) this.speedX = -this.speedX;
      if (this.y < 0 || this.y > height) this.speedY = -this.speedY;
    }
    draw() {
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.radius, 0, Math.PI*2);
      ctx.fillStyle = `rgba(0, 255, 247, ${this.opacity})`;
      ctx.fill();
    }
  }

  const particles = [];
  for(let i=0; i<120; i++) {
    particles.push(new Particle());
  }

  function animate() {
    ctx.clearRect(0, 0, width, height);

    particles.forEach(p => {
      p.update();
      p.draw();
    });

    requestAnimationFrame(animate);
  }
  animate();
</script>

</body>
</html>
