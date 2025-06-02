<footer class="arcade-footer">
    <div class="footer-content">
        <p>
            &copy; {{ now()->year }} {{ $perfil->name ?? 'Juega Ya' }} - Todos los derechos reservados.
        </p>

        <div class="footer-links">
            @if($perfil->facebook)
                <a href="{{ $perfil->facebook }}" target="_blank">Facebook</a>
            @endif
            @if($perfil->instagram)
                <a href="{{ $perfil->instagram }}" target="_blank">Instagram</a>
            @endif
            @if($perfil->tiktok)
                <a href="{{ $perfil->tiktok }}" target="_blank">TikTok</a>
            @endif
        </div>

        <div class="footer-dev">
            Desarrollado por <span class="dev-name">TuNombreDev</span> 👾
        </div>
    </div>
</footer>

<style>
.arcade-footer {
    background: linear-gradient(to right, #0f0f0f, #1a1a1a);
    color: #00ff99;
    padding: 2rem 1rem;
    text-align: center;
    font-family: 'Press Start 2P', cursive;
    border-top: 2px solid #00ffcc;
    box-shadow: 0 -4px 12px rgba(0, 255, 204, 0.2);
    position: relative;
    overflow: hidden;
}

.footer-content {
    max-width: 1000px;
    margin: auto;
    animation: neon-flicker 2.5s infinite alternate;
}

.footer-links a {
    color: #66ffcc;
    margin: 0 10px;
    text-decoration: none;
    font-size: 0.75rem;
    transition: all 0.3s ease;
    position: relative;
}

.footer-links a:hover {
    color: #ffffff;
    text-shadow: 0 0 5px #0ff, 0 0 10px #0ff;
    animation: glitch 0.3s ease;
    /* Opcional: sonido al hacer hover */
    /* onmouseenter="document.getElementById('hover-sound').play()" */
}

.footer-dev {
    margin-top: 1rem;
    font-size: 0.65rem;
    color: #999;
}

.dev-name {
    color: #00ffff;
    text-shadow: 0 0 5px #0ff, 0 0 10px #0ff;
}

/* Animación tipo flicker */
@keyframes neon-flicker {
    0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
        opacity: 1;
    }
    20%, 24%, 55% {
        opacity: 0.4;
    }
}

/* Glitch effect (leve) */
@keyframes glitch {
    0% { transform: translate(0); }
    20% { transform: translate(-1px, 1px); }
    40% { transform: translate(1px, -1px); }
    60% { transform: translate(-1px, 0px); }
    80% { transform: translate(1px, 1px); }
    100% { transform: translate(0); }
}
</style>

{{-- OPCIONAL: sonido arcade al pasar el mouse sobre los enlaces --}}
{{-- <audio id="hover-sound" src="{{ asset('sounds/beep.wav') }}" preload="auto"></audio> --}}
