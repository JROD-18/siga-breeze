<header class="arcade-header">
    <div class="bg-arcade-top py-2 text-neon d-none d-lg-block">
        <div class="container">
            <div class="row justify-content-between align-items-center text-center text-lg-left">
                <div class="col-lg-6">
                    <div class="d-inline-flex align-items-center gap-3">
                        <span><i class="fa fa-envelope"></i> {{ $perfil->email ?? 'No disponible' }}</span>
                        <span>|</span>
                        <span><i class="fa fa-phone-alt"></i> {{ $perfil->celular ?? 'No disponible' }}</span>
                    </div>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        @if (!empty($perfil?->facebook))
                            <a class="icon-link" href="{{ $perfil->facebook }}"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if (!empty($perfil?->tiktok))
                            <a class="icon-link" href="{{ $perfil->tiktok }}"><i class="fab fa-tiktok"></i></a>
                        @endif
                        @if (!empty($perfil?->instagram))
                            <a class="icon-link" href="{{ $perfil->instagram }}"><i class="fab fa-instagram"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar estilo arcade -->
    <div class="bg-arcade-nav shadow-lg py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="/" class="navbar-brand arcade-logo text-neon-glow">
                {{ $perfil->name ?? 'Mi Empresa' }}
            </a>
            <nav class="d-flex align-items-center gap-4 arcade-nav-links">
                <a href="/" class="arcade-link">Home</a>
                <a href="/acerca" class="arcade-link">Sobre Nosotros</a>
                <a href="/nuevo" class="arcade-link">Noticias</a>
                <a href="/contactanos" class="arcade-link">Contáctanos</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="arcade-link">{{ Auth::user()->name }}</a>
                    @else
                        <a href="{{ route('login') }}" class="arcade-link">Entrar</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="arcade-link">Registrarme</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </div>
</header>

<style>
/* Estilos arcade */
.bg-arcade-top {
    background: linear-gradient(to right, #111, #222);
    font-family: 'Press Start 2P', cursive;
    font-size: 12px;
    color: #00ffff;
}

.bg-arcade-nav {
    background: #0f0f0f;
    border-top: 3px solid #00ffea;
    border-bottom: 3px solid #00ffea;
}

.text-neon, .arcade-link {
    color: #00ffff;
}

.text-neon-glow {
    color: #00ffff;
    text-shadow: 0 0 5px #00ffff, 0 0 10px #00ffff, 0 0 20px #00ffff;
    font-family: 'Press Start 2P', cursive;
    font-size: 1.5rem;
}

.arcade-link {
    font-family: 'Press Start 2P', cursive;
    font-size: 10px;
    text-decoration: none;
    padding: 5px 10px;
    transition: all 0.2s ease-in-out;
}

.arcade-link:hover {
    color: #fff;
    background-color: #00ffff;
    border-radius: 5px;
}

.icon-link {
    color: #00ffff;
    font-size: 16px;
    margin: 0 5px;
    transition: 0.3s;
}

.icon-link:hover {
    transform: scale(1.2);
    color: #fff;
}

/* Responsive */
@media (max-width: 768px) {
    .arcade-logo {
        font-size: 1rem;
    }
    .arcade-link {
        font-size: 8px;
    }
}
</style>

<!-- Asegúrate de tener esta fuente arcade en tu layout -->
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
