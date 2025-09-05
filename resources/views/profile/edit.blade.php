<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-300 to-purple-300 tracking-wide neon-text">
            {{ __('PERFIL') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Sección: Información del perfil --}}
            <div class="p-6 sm:p-8 arcade-frame bg-gradient-to-br from-fuchsia-900 via-purple-900 to-fuchsia-900 border-4 border-fuchsia-300/70 rounded-2xl shadow-[0_0_30px_10px_rgba(236,72,153,0.6)] relative neon-glow">
                <div class="crt-effect absolute inset-0 pointer-events-none"></div>
                <div class="relative z-10">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Sección: Actualizar contraseña --}}
            <div class="p-6 sm:p-8 arcade-frame bg-gradient-to-br from-fuchsia-900 via-purple-900 to-fuchsia-900 border-4 border-fuchsia-300/70 rounded-2xl shadow-[0_0_30px_10px_rgba(236,72,153,0.6)] relative neon-glow">
                <div class="crt-effect absolute inset-0 pointer-events-none"></div>
                <div class="relative z-10">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Sección: Eliminar cuenta --}}
            <div class="p-6 sm:p-8 arcade-frame bg-gradient-to-br from-fuchsia-900 via-purple-900 to-fuchsia-900 border-4 border-fuchsia-300/70 rounded-2xl shadow-[0_0_30px_10px_rgba(236,72,153,0.6)] relative neon-glow">
                <div class="crt-effect absolute inset-0 pointer-events-none"></div>
                <div class="relative z-10">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <!-- Estilos arcade -->
    <style>
        .neon-text {
            text-shadow: 0 0 8px #ec4899, 0 0 16px #d946ef;
        }

        .neon-glow {
            box-shadow: 0 0 25px 8px rgba(236, 72, 153, 0.6),
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

        @media (max-width: 640px) {
            .neon-text {
                text-shadow: 0 0 5px #ec4899, 0 0 10px #d946ef;
            }
        }
    </style>
</x-app-layout>

