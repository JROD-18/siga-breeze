<section class="arcade-frame bg-gradient-to-br from-fuchsia-900 via-purple-900 to-fuchsia-900 border-4 border-fuchsia-300/70 rounded-2xl shadow-[0_0_30px_10px_rgba(236,72,153,0.6)] p-6 neon-glow space-y-6">
    <header>
        <h2 class="text-xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-300 to-purple-300 tracking-wide neon-text">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-2 text-sm text-gray-300">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-fuchsia-300" />
            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
                class="mt-1 block w-full rounded-md border border-fuchsia-400 bg-transparent text-white placeholder:text-fuchsia-400 focus:border-purple-500 focus:ring-purple-500"
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-pink-400" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-fuchsia-300" />
            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
                class="mt-1 block w-full rounded-md border border-fuchsia-400 bg-transparent text-white placeholder:text-fuchsia-400 focus:border-purple-500 focus:ring-purple-500"
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-pink-400" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-fuchsia-300" />
            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                class="mt-1 block w-full rounded-md border border-fuchsia-400 bg-transparent text-white placeholder:text-fuchsia-400 focus:border-purple-500 focus:ring-purple-500"
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-pink-400" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="relative overflow-hidden bg-gradient-to-r from-fuchsia-500 to-purple-600 hover:from-fuchsia-400 hover:to-purple-500 text-white font-bold px-5 py-2 rounded-lg shadow-[0_0_15px_3px_rgba(236,72,153,0.6)] hover:shadow-[0_0_20px_5px_rgba(236,72,153,0.8)] transition-transform hover:scale-105">
                <span class="relative z-10 font-mono tracking-wider">{{ __('Save') }}</span>
                <span class="absolute inset-0 bg-gradient-to-r from-fuchsia-400 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                <span class="absolute top-0 left-0 w-1/2 h-full bg-white/10 transform -skew-x-12 -translate-x-full group-hover:translate-x-[400%] transition-transform duration-700"></span>
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-fuchsia-300 font-semibold"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
