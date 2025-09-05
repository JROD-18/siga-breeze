<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $perfil->titulo ?? 'Juega Ya - Portal Gamer' }}</title>

  <!-- SEO -->
  @if($perfil->seo)
    <meta property="og:image" content="{{ asset('storage/' . $perfil->seo) }}">
  @endif

  <!-- Fuentes Arcade + Modernas -->
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Montserrat:wght@400;700&family=Orbitron:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="icon" href="{{ asset('storage/' . $perfil->favicon) }}" type="image/png" />

  <!-- Font Awesome para íconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    :root {
      --neon-pink: #ff2a6d;
      --neon-purple: #d300c5;
      --neon-blue: #05d9e8;
      --neon-green: #00ff9d;
      --dark-bg: #0d0221;
      --darker-bg: #060114;
    }
    
    body {
      margin: 0;
      padding: 0;
      font-family: 'Orbitron', 'Montserrat', sans-serif;
      background-color: var(--dark-bg);
      color: white;
      overflow-x: hidden;
      position: relative;
    }
    
    /* Efecto de escaneo CRT */
    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: 
        linear-gradient(rgba(18, 16, 16, 0) 50%, 
        rgba(0, 0, 0, 0.25) 50%),
        linear-gradient(90deg, rgba(255, 0, 0, 0.06), 
        rgba(0, 255, 0, 0.02), 
        rgba(0, 0, 255, 0.06));
      background-size: 100% 4px, 4px 100%;
      pointer-events: none;
      z-index: 1000;
      animation: scanline 8s linear infinite;
    }
    
    /* Animaciones */
    @keyframes scanline {
      0% { background-position: 0 0; }
      100% { background-position: 0 100%; }
    }
    
    @keyframes neon-flicker {
      0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
        text-shadow: 0 0 8px var(--neon-pink), 0 0 16px var(--neon-purple);
      }
      20%, 24%, 55% {
        text-shadow: none;
      }
    }
    
    @keyframes neon-pulse {
      0% { opacity: 0.8; }
      100% { opacity: 1; }
    }
    
    /* Header Arcade */
    header {
      text-align: center;
      padding: 4rem 1rem;
      position: relative;
      overflow: hidden;
      background: linear-gradient(135deg, var(--darker-bg) 0%, var(--dark-bg) 100%);
      border-bottom: 4px solid var(--neon-pink);
      box-shadow: 0 0 30px rgba(255, 42, 109, 0.3);
    }
    
    header h1 {
      font-family: 'Press Start 2P', cursive;
      font-size: 3rem;
      margin: 0;
      color: var(--neon-blue);
      text-shadow: 0 0 10px var(--neon-blue), 0 0 20px var(--neon-blue);
      animation: neon-flicker 1.5s infinite alternate;
      letter-spacing: 3px;
    }
    
    header p {
      font-family: 'Orbitron', sans-serif;
      font-size: 1.5rem;
      margin: 1rem 0 0;
      color: var(--neon-green);
      text-shadow: 0 0 5px var(--neon-green);
      animation: neon-pulse 2s infinite alternate;
    }
    
    /* Navegación estilo Arcade */
    nav {
      display: flex;
      justify-content: center;
      gap: 2rem;
      padding: 1.5rem;
      background: rgba(13, 2, 33, 0.8);
      backdrop-filter: blur(10px);
      position: sticky;
      top: 0;
      z-index: 100;
      border-bottom: 2px solid var(--neon-purple);
    }
    
    nav a {
      font-family: 'Orbitron', sans-serif;
      color: white;
      text-decoration: none;
      font-weight: bold;
      padding: 0.8rem 1.5rem;
      border-radius: 30px;
      background: rgba(255, 42, 109, 0.2);
      border: 2px solid var(--neon-pink);
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-size: 0.9rem;
      position: relative;
      overflow: hidden;
    }
    
    nav a:hover {
      background: rgba(255, 42, 109, 0.4);
      box-shadow: 0 0 15px var(--neon-pink);
      transform: translateY(-3px);
    }
    
    nav a::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(
        to bottom right,
        transparent 45%,
        rgba(255, 255, 255, 0.3) 50%,
        transparent 55%
      );
      transform: rotate(45deg);
      transition: all 0.5s ease;
      opacity: 0;
    }
    
    nav a:hover::before {
      animation: shine 1.5s ease;
    }
    
    @keyframes shine {
      0% { left: -50%; opacity: 0; }
      50% { opacity: 1; }
      100% { left: 150%; opacity: 0; }
    }
    
    /* Contenido principal */
    main {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      padding: 3rem 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }
    
    .card {
      background: rgba(6, 1, 20, 0.7);
      border-radius: 15px;
      padding: 2rem;
      border: 2px solid var(--neon-purple);
      box-shadow: 0 0 20px rgba(211, 0, 197, 0.2);
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    
    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 0 30px rgba(211, 0, 197, 0.4);
      border-color: var(--neon-blue);
    }
    
    .card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--neon-pink), var(--neon-blue));
    }
    
    .card h2 {
      font-family: 'Press Start 2P', cursive;
      color: var(--neon-pink);
      font-size: 1.2rem;
      margin-top: 0;
      margin-bottom: 1.5rem;
      text-shadow: 0 0 5px var(--neon-pink);
    }
    
    .card ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    
    .card li {
      margin-bottom: 1rem;
      font-family: 'Orbitron', sans-serif;
      font-size: 0.9rem;
      line-height: 1.6;
    }
    
    .card li strong {
      color: var(--neon-green);
    }
    
    .card a {
      color: var(--neon-blue);
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    .card a:hover {
      color: var(--neon-green);
      text-shadow: 0 0 5px var(--neon-green);
    }
    
    /* Footer */
    footer {
      text-align: center;
      padding: 2rem;
      background: var(--darker-bg);
      border-top: 2px solid var(--neon-purple);
      font-family: 'Orbitron', sans-serif;
      font-size: 0.8rem;
      color: var(--neon-blue);
      letter-spacing: 1px;
    }
    
    /* Efecto de partículas */
    #particle-canvas {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      pointer-events: none;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
      header h1 {
        font-size: 2rem;
      }
      
      header p {
        font-size: 1.2rem;
      }
      
      nav {
        flex-wrap: wrap;
        gap: 1rem;
      }
      
      nav a {
        padding: 0.6rem 1rem;
        font-size: 0.8rem;
      }
      
      main {
        grid-template-columns: 1fr;
        padding: 2rem 1rem;
      }
    }
    
    /* Efecto de botones LED */
    .led-button {
      display: inline-block;
      padding: 0.8rem 1.5rem;
      background: var(--neon-pink);
      color: black;
      font-weight: bold;
      border-radius: 30px;
      text-decoration: none;
      font-family: 'Orbitron', sans-serif;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 0 15px var(--neon-pink);
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      border: none;
      cursor: pointer;
    }
    
    .led-button:hover {
      background: var(--neon-blue);
      box-shadow: 0 0 25px var(--neon-blue);
      transform: translateY(-3px);
    }
    
    /* Efecto de grid neon */
    .grid-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        linear-gradient(rgba(255, 42, 109, 0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 42, 109, 0.03) 1px, transparent 1px);
      background-size: 20px 20px;
      pointer-events: none;
      z-index: -1;
    }
  </style>
</head>
<body>
  <div class="grid-overlay"></div>
  
  @include('components.header')

  <nav>
    @auth
      <a href="{{ url('/dashboard') }}" class="led-button">Panel</a>
    @else
      <a href="{{ route('login') }}" class="led-button">Iniciar sesión</a>
      @if(Route::has('register'))
        <a href="{{ route('register') }}" class="led-button">Registrarse</a>
      @endif
    @endauth
  </nav>

  <header>
    <h1>{{ $perfil->name ?? 'JUEGA YA' }}</h1>
    <p>{{ $perfil->slogan ?? 'Explora todos los estilos: Retro, Arcade y Modernos.' }}</p>
  </header>

  <main>
    <section class="card">
      <h2><i class="fas fa-info-circle"></i> Sobre Nosotros</h2>
      <ul>
        <li><strong>{{ $perfil->titulo }}</strong></li>
        <li>{{ $perfil->descripcion }}</li>

        @if($perfil->logo)
          <li>
            <img src="{{ asset('storage/' . $perfil->logo) }}" alt="Logo" style="max-width: 150px; margin-top: 10px; border: 2px solid var(--neon-blue); border-radius: 5px; box-shadow: 0 0 15px var(--neon-blue);">
          </li>
        @endif

        @if($perfil->logo2)
          <li>
            <img src="{{ asset('storage/' . $perfil->logo2) }}" alt="Logo Alternativo" style="max-width: 150px; margin-top: 10px; border: 2px solid var(--neon-pink); border-radius: 5px; box-shadow: 0 0 15px var(--neon-pink);">
          </li>
        @endif
      </ul>
    </section>

    <section class="card">
      <h2><i class="fas fa-map-marker-alt"></i> Contacto</h2>
      <ul>
        <li><strong><i class="fas fa-home"></i> Dirección:</strong> {{ $perfil->direccion }}</li>
        <li><strong><i class="fas fa-mobile-alt"></i> Celular:</strong> {{ $perfil->celular }}</li>
        <li><strong><i class="fas fa-envelope"></i> Email:</strong> {{ $perfil->email }}</li>
      </ul>
    </section>

    <section class="card">
      <h2><i class="fas fa-share-alt"></i> Redes Sociales</h2>
      <ul>
        @if($perfil->facebook) <li><i class="fab fa-facebook"></i> Facebook: <a href="{{ $perfil->facebook }}" target="_blank">{{ $perfil->facebook }}</a></li> @endif
        @if($perfil->instagram) <li><i class="fab fa-instagram"></i> Instagram: <a href="{{ $perfil->instagram }}" target="_blank">{{ $perfil->instagram }}</a></li> @endif
        @if($perfil->tiktok) <li><i class="fab fa-tiktok"></i> TikTok: <a href="{{ $perfil->tiktok }}" target="_blank">{{ $perfil->tiktok }}</a></li> @endif
      </ul>
    </section>
  </main>

  <footer>
    &copy; {{ now()->year }} {{ $perfil->name ?? 'Juega Ya' }}. Todos los derechos reservados.
  </footer>

  <canvas id="particle-canvas"></canvas>
  
  <script>
    // Efecto de partículas interactivas
    document.addEventListener('DOMContentLoaded', function() {
      const canvas = document.getElementById('particle-canvas');
      const ctx = canvas.getContext('2d');
      
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
      
      // Ajustar tamaño al cambiar la ventana
      window.addEventListener('resize', function() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
      });
      
      // Configuración de partículas
      const particles = [];
      const particleCount = Math.floor(window.innerWidth / 10);
      
      // Colores neón
      const colors = [
        '#ff2a6d', // neon pink
        '#05d9e8', // neon blue
        '#d300c5', // neon purple
        '#00ff9d'  // neon green
      ];
      
      // Crear partículas
      for (let i = 0; i < particleCount; i++) {
        particles.push({
          x: Math.random() * canvas.width,
          y: Math.random() * canvas.height,
          size: Math.random() * 3 + 1,
          speedX: Math.random() * 2 - 1,
          speedY: Math.random() * 2 - 1,
          color: colors[Math.floor(Math.random() * colors.length)],
          opacity: Math.random() * 0.5 + 0.1
        });
      }
      
      // Animación de partículas
      function animateParticles() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        for (let i = 0; i < particles.length; i++) {
          const p = particles[i];
          
          // Actualizar posición
          p.x += p.speedX;
          p.y += p.speedY;
          
          // Rebotar en los bordes
          if (p.x < 0 || p.x > canvas.width) p.speedX *= -1;
          if (p.y < 0 || p.y > canvas.height) p.speedY *= -1;
          
          // Dibujar partícula
          ctx.beginPath();
          ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
          ctx.fillStyle = p.color;
          ctx.globalAlpha = p.opacity;
          ctx.fill();
          
          // Conectar partículas cercanas
          for (let j = i + 1; j < particles.length; j++) {
            const p2 = particles[j];
            const distance = Math.sqrt(
              Math.pow(p.x - p2.x, 2) + 
              Math.pow(p.y - p2.y, 2)
            );
            
            if (distance < 100) {
              ctx.beginPath();
              ctx.strokeStyle = p.color;
              ctx.globalAlpha = (1 - distance / 100) * 0.2;
              ctx.lineWidth = 0.5;
              ctx.moveTo(p.x, p.y);
              ctx.lineTo(p2.x, p2.y);
              ctx.stroke();
            }
          }
        }
        
        requestAnimationFrame(animateParticles);
      }
      
      // Interacción con el mouse
      let mouseX = null;
      let mouseY = null;
      
      window.addEventListener('mousemove', function(e) {
        mouseX = e.clientX;
        mouseY = e.clientY;
        
        // Afectar partículas cercanas al mouse
        for (let i = 0; i < particles.length; i++) {
          const p = particles[i];
          const distance = Math.sqrt(
            Math.pow(p.x - mouseX, 2) + 
            Math.pow(p.y - mouseY, 2)
          );
          
          if (distance < 100) {
            // Empujar las partículas
            p.x += (p.x - mouseX) * 0.01;
            p.y += (p.y - mouseY) * 0.01;
            
            // Aumentar opacidad
            p.opacity = Math.min(0.8, p.opacity + 0.01);
          }
        }
      });
      
      animateParticles();
      
      // Efecto de sonido para botones
      const buttons = document.querySelectorAll('a, button');
      const clickSound = new Audio('https://assets.mixkit.co/sfx/preview/mixkit-arcade-game-jump-coin-216.mp3');
      clickSound.volume = 0.3;
      
      buttons.forEach(button => {
        button.addEventListener('click', function() {
          clickSound.currentTime = 0;
          clickSound.play().catch(e => console.log("Audio error:", e));
        });
      });
    });
  </script>
  
  @include('components.footer')
</body>
</html>