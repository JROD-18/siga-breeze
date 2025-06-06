<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Permisos') }}
            </h2>
            @can('crear permisos')
                <a href="{{ route('permissions.create') }}" class="bg-slate-700 text-sm text-white rounded-md px-3 py-2">Crear</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message />
            <table class="table table-striped-columns w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 text-left text-white" width="30">#</th>
                        <th scope="col" class="px-6 py-3 text-left text-white">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-white" width="250">Creación</th>
                        <th scope="col" class="px-6 py-3 text-center text-white" width="200">Acción</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @if ($permissions->isNotEmpty())
                        @foreach ($permissions as $permission)
                            <tr class="border-b bg-gray-50 text-white">
                                <td class="px-6 py-3 text-left">{{ $permission->id }}</td>
                                <td class="px-6 py-3 text-left">{{ $permission->name }}</td>
                                <td class="px-6 py-3 text-left">{{ $permission->created_at->format('d M, y') }}</td>
                                <td class="px-6 py-3 text-center">
                                    @can('editar permisos')
                                        <a href="{{ route('permissions.edit', $permission->id) }}" class="bg-red-700 text-sm text-white rounded-md px-1 py-1 hover:bg-red-600">Editar</a>
                                    @endcan

                                @can('eliminar permisos')
    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro que deseas eliminar este permiso?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-slate-700 text-sm text-white rounded-md px-2 py-1 hover:bg-slate-600">
            Eliminar
        </button>
    </form>
@endcan


                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="my-3 text-white">
                {{ $permissions->links() }}
            </div>
        </div>
    </div>

  
        {{-- Asegúrate que jQuery esté cargado antes de este script --}}
  


</x-app-layout>
