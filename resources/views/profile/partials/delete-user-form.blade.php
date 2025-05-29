<section class="space-y-6 arcade-frame bg-gradient-to-br from-fuchsia-900 via-purple-900 to-fuchsia-900 border-4 border-fuchsia-300/70 rounded-2xl shadow-[0_0_30px_10px_rgba(236,72,153,0.6)] relative neon-glow p-6">
    <header>
        <h2 class="text-xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-300 to-purple-300 tracking-wide neon-text">
            {{ __('Borrar Cuenta') }}
        </h2>

        <p class="mt-2 text-sm text-gray-300">
            {{ __('Una vez eliminada su cuenta, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminarla, descargue cualquier dato o información que desee conservar.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="relative overflow-hidden bg-gradient-to-r from-fuchsia-500 to-purple-600 hover:from-fuchsia-400 hover:to-purple-500 text-white font-bold px-5 py-2 rounded-lg shadow-[0_0_15px_3px_rgba(236,72,153,0.6)] hover:shadow-[0_0_20px_5px_rgba(236,72,153,0.8)] transition-transform hover:scale-105"
    >
        <span class="relative z-10 font-mono tracking-wider">{{ __('Borrar Cuenta') }}</span>
        <span class="absolute inset-0 bg-gradient-to-r from-fuchsia-400 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity"></span>
        <span class="absolute top-0 left-0 w-1/2 h-full bg-white/10 transform -skew-x-12 -translate-x-full group-hover:translate-x-[400%] transition-transform duration-700"></span>
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-6 arcade-frame bg-gradient-to-br from-fuchsia-900 via-purple-900 to-fuchsia-900 border-4 border-fuchsia-300/70 rounded-2xl shadow-[0_0_30px_10px_rgba(236,72,153,0.6)] neon-glow">
            @csrf
            @method('delete')

            <h2 class="text-lg font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-300 to-purple-300 tracking-wide neon-text">
                {{ __('Estas seguro que quieres borrar tu cuenta?') }}
            </h2>

            <p class="text-sm text-gray-300">
                {{ __('Una vez eliminada su cuenta, todos sus recursos y datos se eliminarán permanentemente. Ingrese su contraseña para confirmar que desea eliminar su cuenta permanentemente.') }}
            </p>

            <div>
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full rounded-md border border-fuchsia-400 bg-transparent text-white placeholder:text-fuchsia-400 focus:border-purple-500 focus:ring-purple-500"
                    placeholder="{{ __('Contraseña') }}"
                    autocomplete="current-password"
                    required
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-pink-400" />
            </div>

            <div class="flex justify-end gap-3">
                <x-secondary-button
                    x-on:click="$dispatch('close')"
                    class="bg-gray-700 hover:bg-gray-600 text-white font-bold px-4 py-2 rounded-lg shadow-[0_0_10px_rgba(100,100,100,0.5)] transition-transform hover:scale-105">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button
                    class="relative overflow-hidden bg-gradient-to-r from-fuchsia-500 to-purple-600 hover:from-fuchsia-400 hover:to-purple-500 text-white font-bold px-5 py-2 rounded-lg shadow-[0_0_15px_3px_rgba(236,72,153,0.6)] hover:shadow-[0_0_20px_5px_rgba(236,72,153,0.8)] transition-transform hover:scale-105"
                >
                    <span class="relative z-10 font-mono tracking-wider">{{ __('Borrar Cuenta') }}</span>
                    <span class="absolute inset-0 bg-gradient-to-r from-fuchsia-400 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                    <span class="absolute top-0 left-0 w-1/2 h-full bg-white/10 transform -skew-x-12 -translate-x-full group-hover:translate-x-[400%] transition-transform duration-700"></span>
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
