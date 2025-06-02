<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between" >
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Articulos / Editar </h2>
            <a href="{{route('articles.index')}}" class="bg-slate-700 text-sm text-white rounded-md px-3 py-2">Atras</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form action="{{ route('articles.update', $article->id) }}" method="post">
    @csrf
    @method('PUT') {{-- o PATCH, según prefieras --}}

    <div>
        <label for="titulo" class="text-lg font-medium">Titulo</label>
        <div class="my-3">
            <input 
                value="{{ old('titulo', $article->titulo) }}" 
                name="titulo" 
                placeholder="Titulo" 
                type="text" 
                class="border-gray-300 shadow-sm w-1/2 rounded-lg"
            >
            @error('titulo')
                <p class="text-red-400 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <label for="texto" class="text-lg font-medium">Contenido</label>
        <div class="my-3">
            <textarea 
                name="texto" 
                id="texto" 
                cols="30" rows="10" 
                placeholder="Contenido" 
                class="border-gray-300 shadow-sm w-1/2 rounded-lg"
            >{{ old('texto', $article->texto) }}</textarea>
            @error('texto')
                <p class="text-red-400 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <label for="autor" class="text-lg font-medium">Autor</label>
        <div class="my-3">
            <input 
                value="{{ old('autor', $article->autor) }}" 
                name="autor" 
                placeholder="Autor" 
                type="text" 
                class="border-gray-300 shadow-sm w-1/2 rounded-lg"
            >
            @error('autor')
                <p class="text-red-400 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <button class="bg-slate-700 text-sm text-white rounded-md px-3 py-2">Guardar</button>
    </div>
</form>

    </div></div>
    </div>
    </div>
</x-app-layout>
 