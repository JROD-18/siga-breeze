<x-guest-layout>
    <div class="w-full max-w-md mx-4 sm:mx-auto arcade-frame bg-gradient-to-br from-fuchsia-900 via-purple-900 to-fuchsia-900 border-4 border-fuchsia-300/80 rounded-t-[2rem] rounded-b-md shadow-[0_0_30px_10px_rgba(236,72,153,0.7),0_0_50px_15px_rgba(168,85,247,0.5)] relative overflow-hidden neon-glow">
        <div class="crt-effect absolute inset-0 pointer-events-none"></div>

        <div class="bg-black p-4 rounded-t-[2rem] border-b-4 border-fuchsia-400 text-center shadow-inner relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-fuchsia-500/30 to-transparent animate-scanline"></div>
            <h2 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-300 to-purple-300 tracking-wider neon-text">REGISTRO</h2>
        </div>

        <form method="POST" action="{{ route('register') }}" class="p-4 sm:p-6 md:p-8 space-y-4 text-white relative z-10">
            @csrf

            <!-- Nombre -->
            <div class="relative group">
                <x-input-label for="name" :value="__('Nombre')" class="text-purple-200 text-sm sm:text-base font-mono tracking-wide" />
                <x-text-input id="name" name="name" type="text" :value="old('name')" required autofocus autocomplete="name"
                    placeholder="Tu nombre"
                    class="block mt-1 w-full bg-black/70 text-white border-2 border-fuchsia-400/50 focus:border-fuchsia-400 placeholder-purple-400/50 font-mono text-sm sm:text-base" />
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-fuchsia-300 font-mono text-xs" />
            </div>

            <!-- Email -->
            <div class="relative group">
                <x-input-label for="email" :value="__('Correo Electrónico')" class="text-purple-200 text-sm sm:text-base font-mono tracking-wide" />
                <x-text-input id="email" name="email" type="email" :value="old('email')" required autocomplete="username"
                    placeholder="correo@ejemplo.com"
                    class="block mt-1 w-full bg-black/70 text-white border-2 border-fuchsia-400/50 focus:border-fuchsia-400 placeholder-purple-400/50 font-mono text-sm sm:text-base" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-fuchsia-300 font-mono text-xs" />
            </div>

            <!-- Password -->
            <div class="relative group">
                <x-input-label for="password" :value="__('Contraseña')" class="text-purple-200 text-sm sm:text-base font-mono tracking-wide" />
                <x-text-input id="password" name="password" type="password" required autocomplete="new-password"
                    placeholder="••••••••"
                    class="block mt-1 w-full bg-black/70 text-white border-2 border-fuchsia-400/50 focus:border-fuchsia-400 placeholder-purple-400/50 font-mono text-sm sm:text-base" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-fuchsia-300 font-mono text-xs" />
            </div>

            <!-- Confirm Password -->
            <div class="relative group">
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-purple-200 text-sm sm:text-base font-mono tracking-wide" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                    placeholder="••••••••"
                    class="block mt-1 w-full bg-black/70 text-white border-2 border-fuchsia-400/50 focus:border-fuchsia-400 placeholder-purple-400/50 font-mono text-sm sm:text-base" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-fuchsia-300 font-mono text-xs" />
            </div>

            <!-- Enlace + Botón -->
            <div class="flex flex-col gap-4 mt-6">
                <a href="{{ route('login') }}" class="text-xs sm:text-sm text-fuchsia-300 hover:text-white font-mono text-center hover:underline underline-offset-4">
                    {{ __('¿Ya tienes cuenta? Inicia sesión') }}
                </a>

                <x-primary-button class="relative overflow-hidden bg-gradient-to-r from-fuchsia-500 to-purple-600 hover:from-fuchsia-400 hover:to-purple-500 text-white font-bold px-6 py-2 rounded-lg shadow-[0_0_20px_5px_rgba(236,72,153,0.5)] transform transition-all hover:scale-105 group text-sm sm:text-base">
                    <span class="relative z-10 font-mono tracking-wider">{{ __('REGISTRARME') }}</span>
                    <span class="absolute inset-0 bg-gradient-to-r from-fuchsia-400 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                    <span class="absolute top-0 left-0 w-1/2 h-full bg-white/10 transform -skew-x-12 -translate-x-full group-hover:translate-x-[400%] transition-transform duration-700"></span>
                </x-primary-button>
            </div>
        </form>

        <!-- Base -->
        <div class="bg-black h-6 sm:h-8 w-full rounded-b-md border-t-2 border-fuchsia-400/50 relative">
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-24 sm:w-32 h-1 sm:h-1.5 bg-gradient-to-r from-transparent via-fuchsia-400 to-transparent"></div>
        </div>
    </div>

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
