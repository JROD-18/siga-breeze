<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Permisos / Editar
            </h2>
            <a href="{{ route('permissions.index') }}" class="bg-slate-700 text-sm text-white rounded-md px-3 py-2">Atrás</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="text-lg font-medium">Nombre</label>
                            <div class="my-3">
                                <input
                                    value="{{ old('name', $permission->name) }}"
                                    name="name"
                                    id="name"
                                    placeholder="Nombre"
                                    type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                >
                                @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="bg-slate-700 text-sm text-white rounded-md px-3 py-2">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
