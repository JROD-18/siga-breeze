<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Roles') }}
            </h2>
            @can('ver roles')
                <a href="{{ route('roles.create') }}" class="bg-slate-700 text-sm text-white rounded-md px-3 py-2 hover:bg-slate-600">Crear</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message/>

            <table class="table table-striped-columns w-full">
                <thead class="bg-gray-900">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-left text-white" width="30">#</th>
                        <th class="px-6 py-3 text-left text-white">Name</th>
                        <th class="px-6 py-3 text-left text-white" width="500">Permisos</th>
                        <th class="px-6 py-3 text-left text-white" width="250">Creación</th>
                        <th class="px-6 py-3 text-center text-white" width="200">Acción</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($roles as $role)
                        <tr class="border-b bg-gray-50">
                            <td class="px-6 py-3 text-left text-white">{{ $role->id }}</td>
                            <td class="px-6 py-3 text-left text-white">{{ $role->name }}</td>
                            <td class="px-6 py-3 text-left text-white">{{ $role->permissions->pluck('name')->implode(', ') }}</td>
                            <td class="px-6 py-3 text-left text-white">{{ $role->created_at->format('d M, y') }}</td>
                            <td class="px-6 py-3 text-center">
                                @can('editar roles')
                                    <a href="{{ route('roles.edit', $role->id) }}" class="bg-slate-700 text-sm text-white rounded-md px-1 py-1 hover:bg-slate-600">Editar</a>
                                @endcan
                        @can('eliminar roles')
    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro que deseas eliminar este rol?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-slate-700 text-sm text-white rounded-md px-2 py-1 hover:bg-slate-600">
            Eliminar
        </button>
    </form>
@endcan
                  </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-white py-4">No hay roles disponibles.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="my-3 text-white">
                {{ $roles->links() }}
            </div>
        </div>
    </div>

    
</x-app-layout>
