<x-guest-layout>
    <div class="w-full max-w-md mx-4 sm:mx-auto arcade-frame bg-gradient-to-br from-fuchsia-900 via-purple-900 to-fuchsia-900 border-4 border-fuchsia-300/80 rounded-t-[2rem] rounded-b-md shadow-[0_0_30px_10px_rgba(236,72,153,0.7),0_0_50px_15px_rgba(168,85,247,0.5)] relative overflow-hidden neon-glow">
        <div class="crt-effect absolute inset-0 pointer-events-none"></div>

        <!-- Header -->
        <div class="bg-black p-4 rounded-t-[2rem] border-b-4 border-fuchsia-400 text-center shadow-inner relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-fuchsia-500/30 to-transparent animate-scanline"></div>
            <h2 class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-300 to-purple-300 tracking-wider neon-text">
                ¿OLVIDASTE TU CONTRASEÑA?
            </h2>
        </div>

        <!-- Contenido -->
        <div class="p-4 sm:p-6 md:p-8 text-white text-sm sm:text-base font-mono space-y-4 relative z-10">
            <p class="text-fuchsia-200 leading-relaxed tracking-wide">
                {{ __('¿Olvidaste tu contraseña? No te preocupes. Ingresa tu correo electrónico y te enviaremos un enlace para restablecerla.') }}
            </p>

            <!-- Estado de sesión -->
            <x-auth-session-status class="text-green-400 font-semibold" :status="session('status')" />

            <!-- Formulario -->
            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Correo Electrónico')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Botón -->
                <x-primary-button class="w-full mt-4 bg-gradient-to-r from-fuchsia-500 to-purple-600 hover:from-fuchsia-400 hover:to-purple-500 text-white font-bold px-4 py-2 rounded-lg shadow-[0_0_15px_3px_rgba(236,72,153,0.4)] hover:scale-105 transform transition-all group">
                    <span class="relative z-10 font-mono tracking-wider text-sm">Enviar Enlace de Recuperación</span>
                    <span class="absolute inset-0 bg-gradient-to-r from-fuchsia-400 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                    <span class="absolute top-0 left-0 w-1/2 h-full bg-white/10 transform -skew-x-12 -translate-x-full group-hover:translate-x-[400%] transition-transform duration-700"></span>
                </x-primary-button>
            </form>
        </div>

        <!-- Base decorativa -->
        <div class="bg-black h-6 sm:h-8 w-full rounded-b-md border-t-2 border-fuchsia-400/50 relative">
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-24 sm:w-32 h-1 sm:h-1.5 bg-gradient-to-r from-transparent via-fuchsia-400 to-transparent"></div>
        </div>
    </div>

    <!-- Estilos -->
    <style>
        .neon-text {
            text-shadow: 0 0 8px #ec4899, 0 0 16px #d946ef;
        }

        .neon-glow {
            box-shadow: 0 0 25px 8px rgba(236, 72, 153, 0.7),
                        0 0 45px 15px rgba(168, 85, 247, 0.5),
                        inset 0 0 15px 3px rgba(236, 72, 153, 0.3);
        }

        .neon-glow:hover {
            box-shadow: 0 0 35px 12px rgba(236, 72, 153, 0.8),
                        0 0 55px 20px rgba(168, 85, 247, 0.6),
                        inset 0 0 20px 5px rgba(236, 72, 153, 0.4);
        }

        .crt-effect {
            background: 
                linear-gradient(rgba(236, 72, 153, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(236, 72, 153, 0.03) 1px, transparent 1px);
            background-size: 4px 4px;
            z-index: 1;
        }

        .crt-effect::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to bottom,
                transparent 0%,
                rgba(168, 85, 247, 0.05) 50%,
                transparent 100%
            );
            animation: flicker 0.15s infinite alternate;
        }

        @keyframes flicker {
            0% { opacity: 0.8; }
            100% { opacity: 1; }
        }

        @keyframes scanline {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(100%); }
        }

        .animate-scanline {
            animation: scanline 6s linear infinite;
        }

        @media (max-width: 640px) {
            .neon-text {
                text-shadow: 0 0 5px #ec4899, 0 0 10px #d946ef;
            }
            .neon-glow {
                box-shadow: 0 0 15px 5px rgba(236, 72, 153, 0.7), 
                            0 0 30px 10px rgba(168, 85, 247, 0.5);
            }
        }
    </style>
</x-guest-layout>
