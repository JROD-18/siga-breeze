<x-app-layout>
    <x-slot name="header">

        <div class="flex justify-between" >
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
        @can('crear usuarios')
            <a href="{{route('users.create')}}" class="bg-slate-700 text-sm text-white rounded-md px-3 py-2">Crear</a>
         @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto bg-slate-50 sm:px-6 lg:px-8">
            <x-message/>
            <table class="table table-striped-columns w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 text-left text-white" width="30">#</th>
                        <th scope="col"  class="px-6 py-3 text-left text-white" >Nombre</th>
                        <th scope="col"  class="px-6 py-3 text-left text-white" >Email</th>
                        <th scope="col"  class="px-6 py-3 text-left text-white" >Roles</th>
                        <th scope="col" class="px-6 py-3 text-left text-white"  width="250">Fecha de creacion </th>
                        <th scope="col" class="px-6 py-3 text-center text-white"  width="200">action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @if ($users->isNotEmpty())
                    @foreach ($users as $user)
                        
                  
                    <tr class="border-b">
                        <td class="px-6 py-3 text-left text-white">  {{$user->id}}</td>
                      
                        <td class="px-6 py-3 text-left text-white"> {{$user->name}}</td>

                        <td class="px-6 py-3 text-left text-white"> {{$user->email}}</td>
                         
                        <td class="px-6 py-3 text-left text-white"> {{$user->roles->pluck('name')->implode(', ')}}</td>
                       
                        <td class="px-6 py-3 text-left text-white">{{\Carbon\Carbon::parse($user->created_at)->format('d M,y')}}</td>
                        
                        <td class="px-6 py-3 text-center">
                           @can('editar usuarios')
                            <a href="{{route('users.edit',$user->id)}}" class="bg-red-700 text-sm text-white rounded-md px-1 py-1 hover:bg-red-600">Editar</a>
                            @endcan @can('editar usuarios')
                            
                            <a href="javascrip:void(0)" onclick="deleteUser({{$user->id}})" class="bg-slate-700 text-sm text-white rounded-md px-1 py-1 hover:bg-slate-600">Eliminar</a>
                           @endcan
                        </td>

                        
                    </tr> 
                     @endforeach
                     @endif
                </tbody>
            </table>
            <div class="my-3">
                  {{$users->links()}}
            </div>
          
        </div>
    </div>
    <x-slot name="script">
       <script type="text/javascript">
    function deleteUser(id){
        if (confirm("¿Estás seguro que deseas eliminar?")) {
            $.ajax({
                url: '{{ route("users.destroy", ":id") }}'.replace(':id', id),
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response){
                    if(response.status){
                        alert('Usuario eliminado correctamente.');
                        window.location.href = '{{ route("users.index") }}';
                    } else {
                        alert('Error al eliminar usuario.');
                    }
                },
                error: function(){
                    alert('Error en la petición.');
                }
            });
        }
    }
</script>

    </x-slot>
</x-app-layout>

