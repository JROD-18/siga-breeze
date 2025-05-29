<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-fuchsia-300 dark:text-fuchsia-400 leading-tight tracking-wider animate-pulse">
            {{ __('DASHBOARD') }}
        </h2>
    </x-slot>

    <div class="py-8 min-h-screen ">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="arcade-screen border-4 border-fuchsia-500/60 rounded-xl p-2 shadow-[0_0_30px_10px_rgba(236,72,153,0.5)] bg-black/90 backdrop-blur-md">
                <div class="relative text-center p-6">
                    <h1 class="text-3xl sm:text-4xl font-extrabold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-300 to-purple-300 tracking-tight neon-title">
                        🚧 EN CONSTRUCCIÓN 🚧
                    </h1>

                    <p class="text-base sm:text-lg text-fuchsia-200 mb-6 font-mono animate-pulse">
                        ¡Próximamente algo épico!
                    </p>

                    <div class="countdown-grid mb-6">
                        <div class="grid grid-cols-4 gap-3 max-w-md mx-auto">
                            @foreach(['DÍAS', 'HRS', 'MIN', 'SEG'] as $label)
                                <div class="countdown-item">
                                    <div class="countdown-number text-4xl sm:text-5xl font-mono text-fuchsia-400 neon-digit">
                                        00
                                    </div>
                                    <div class="countdown-label text-sm sm:text-base text-purple-300 mt-1">{{ $label }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="retro-message inline-block px-4 py-2 border border-fuchsia-400 rounded-md bg-black/60 shadow-inner shadow-fuchsia-500/30 mt-4">
                        <p class="text-base sm:text-lg text-fuchsia-100 font-mono animate-bounce">
                            🎮 ¡Prepárate para jugar! 🕹️
                        </p>
                    </div>

                    <div class="w-full max-w-xs mx-auto mt-6 bg-black/70 h-4 rounded-full border border-fuchsia-400/40 overflow-hidden">
                        <div class="progress-bar h-full bg-gradient-to-r from-fuchsia-500 to-purple-600 rounded-full" style="width: 0%"></div>
                    </div>

                    <div class="flex justify-center gap-4 mt-6">
                        <div class="w-4 h-4 rounded-full bg-fuchsia-400 shadow-[0_0_6px_3px_rgba(236,72,153,0.8)] animate-ping"></div>
                        <div class="w-4 h-4 rounded-full bg-purple-400 shadow-[0_0_6px_3px_rgba(168,85,247,0.8)] animate-ping delay-200"></div>
                        <div class="w-4 h-4 rounded-full bg-white shadow-[0_0_6px_3px_rgba(255,255,255,0.8)] animate-ping delay-400"></div>
                    </div>

                    <!-- Sonido -->
                    <audio id="beepSound" src="{{asset('sounds/retro.mp3')}}" preload="auto"></audio>
                </div>

                <div class="arcade-footer h-4 w-full bg-gradient-to-r from-purple-900/80 via-fuchsia-900/80 to-purple-900/80 border-t border-fuchsia-400/30 mt-4 rounded-b-lg"></div>
            </div>
        </div>
    </div>

    <!-- Estilos neón y animaciones -->
    <style>
        .neon-title {
            text-shadow: 0 0 8px #ec4899, 0 0 14px #d946ef;
            animation: neon-flicker 1.5s infinite alternate;
        }

        .neon-digit {
            text-shadow: 0 0 6px #ec4899, 0 0 12px #d946ef;
            animation: neon-pulse 1s infinite alternate;
        }

        @keyframes neon-flicker {
            0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
                text-shadow: 0 0 8px #ec4899, 0 0 14px #d946ef;
            }
            20%, 24%, 55% {
                text-shadow: 0 0 4px #ec4899, 0 0 6px #d946ef;
            }
        }

        @keyframes neon-pulse {
            0% { opacity: 0.85; }
            100% { opacity: 1; }
        }
    </style>

    <!-- Script Contador -->
    <script>
        const targetDate = new Date();
        targetDate.setDate(targetDate.getDate() + 14);

        const beepSound = document.getElementById("beepSound");

        function updateCountdown() {
            const now = new Date();
            const diff = targetDate - now;

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);

            const digits = [days, hours, minutes, seconds];
            document.querySelectorAll('.countdown-number').forEach((el, idx) => {
                const formatted = digits[idx].toString().padStart(2, '0');
                if (el.textContent !== formatted) {
                    el.textContent = formatted;
                    if (beepSound) beepSound.play();
                }
            });

            const totalDays = 14;
            const progressPercentage = ((totalDays - days) / totalDays) * 100;
            document.querySelector('.progress-bar').style.width = `${progressPercentage}%`;
        }

        setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>
</x-app-layout>
