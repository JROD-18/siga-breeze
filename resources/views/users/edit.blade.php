<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between" >
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Usuarios / Editar
        </h2>
            <a href="{{route('users.index')}}" class="bg-slate-700 text-sm text-white rounded-md px-3 py-2">Atras</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('users.update', $user->id)}}" method="post">
                        @csrf
                    <div>
                   <label for="" class="text-lg font-medium" >Nombre</label>
                    <div class="my-3">
                    <input value="{{old('name ',$user->name)}}" name="name" placeholder="Nombre" type="text" class="border-gray-300 shadow-sm w-1/2 reunderd-lg">
                    @error('name')
                        <p class="text-red-400 font-medium">{{$message}}</p>
                    @enderror
                </div>

                <label for="" class="text-lg font-medium" >Email</label>
                <div class="my-3">
                <input value="{{old('email ',$user->email)}}" name="email" placeholder="Correo Electronico" type="text" class="border-gray-300 shadow-sm w-1/2 reunderd-lg">
                @error('email')
                    <p class="text-red-400 font-medium">{{$message}}</p>
                @enderror
            </div> 
 
                <div class="grid grid-cols-4 mb-3">
                    @if ($roles->isNotEmpty())
                    @foreach ($roles as $role)
                        <div class="my-3">
                          
                            <input {{($hasRoles->contains($role->id))? 'checked': ''}} type="checkbox" id="role-{{$role->id}}" class="rounded" name="role[]"
                            value="{{$role->name}}">
                            <label for="role-{{$role->id}}"> {{$role->name}}</label>
                        </div>
                        @endforeach
                        @endif


                </div>
                <button class="bg-slate-700 hover:bg-slate-500 text-sm text-white rounded-md px-3 py-2">Guardar</button>
            </div>
        </form>
    </div></div>
    </div>
    </div>
</x-app-layout>
