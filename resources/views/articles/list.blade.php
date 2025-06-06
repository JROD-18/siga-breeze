<x-app-layout>
    <x-slot name="header">

        <div class="flex justify-between" >
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articulos') }}
        </h2>
      @can('crear articulos')
            <a href="{{route('articles.create')}}" class="bg-slate-700 text-lg text-black rounded-md px-3 py-2">Crear</a>
         @endcan
    </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message/>
            <table class="table table-striped-columns w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 text-left text-white" width="30">#</th>
                        <th scope="col"  class="px-6 py-3 text-left text-white" >Titulo</th>
                        <th scope="col"  class="px-6 py-3 text-left text-white" >Autor</th>
                        <th scope="col" class="px-6 py-3 text-left text-white"  width="250">creacion </th>
                        <th scope="col" class="px-6 py-3 text-center text-white"  width="200">action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @if ($articles->isNotEmpty())
                    @foreach ($articles as $article)
                        
                  
                    <tr class="border-b">
                        <td class="px-6 py-3 text-left">  {{$article->id}}</td>
                      
                        <td class="px-6 py-3 text-left"> {{$article->titulo}}</td>

                        <td class="px-6 py-3 text-left"> {{$article->autor}}</td>
                       
                        <td class="px-6 py-3 text-left">{{\Carbon\Carbon::parse($article->created_at)->format('d M,y')}}</td>
                        
                       <td class="px-6 py-3 text-center">
    @can('editar articulos')
    <a href="{{ route('articles.edit', $article->id) }}" class="bg-slate-700 text-sm text-white rounded-md px-1 py-1 hover:bg-slate-600">Editar</a>
    @endcan

    @can('eliminar articulos')
    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro que deseas eliminar este artículo?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-700 text-sm text-white rounded-md px-2 py-1 hover:bg-red-600">
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
            <div class="my-3">
                  {{$articles->links()}}
            </div>
          
        </div>
    </div>

</x-app-layout>

