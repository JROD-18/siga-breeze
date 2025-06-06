<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Roles / Editar
            </h2>
            <a href="{{ route('roles.index') }}" class="bg-slate-700 text-sm text-white rounded-md px-3 py-2 hover:bg-slate-600">Atrás</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto bg-slate-50 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Esto indica a Laravel que el método HTTP será PUT --}}

                        <div>
                            <label for="name" class="text-lg font-medium">Nombre</label>
                            <div class="my-3"></div>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                placeholder="Nombre"
                                value="{{ old('name', $role->name) }}"
                                class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                            >
                            @error('name')
                                <p class="text-red-400 font-medium mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-4 mb-3 mt-6">
                            @if ($permissions->isNotEmpty())
                                @foreach ($permissions as $permission)
                                    <div class="my-3">
                                        <input
                                            type="checkbox"
                                            id="permission-{{ $permission->id }}"
                                            name="permission[]"
                                            value="{{ $permission->name }}"
                                            class="rounded"
                                            {{ $hasPermissions->contains($permission->name) ? 'checked' : '' }}
                                        >
                                        <label for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <button type="submit" class="bg-slate-700 hover:bg-slate-500 text-sm text-white rounded-md px-3 py-2">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
