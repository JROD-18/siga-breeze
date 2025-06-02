<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Editar Página de Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-black">
                    @if(session('status'))
                        <div class="alert alert-success mb-4 p-4 bg-green-500 text-white rounded">
                            {{ session('status') }}
                        </div>
                    @endif

                <form action="{{ route('perfil.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- ¡ESTO ES CLAVE! -->


    <!-- Nombre -->
    <div class="form-group mb-4">
        <label for="name" class="block text-sm font-medium text-black">Nombre</label>
        <input type="text" name="name" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm text-black focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('name', $perfil->name ?? '') }}">
    </div>

    <!-- Título -->
    <div class="form-group mb-4">
        <label for="titulo" class="block text-sm font-medium text-black">Título</label>
        <input type="text" name="titulo" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm text-black focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('titulo', $perfil->titulo ?? '') }}">
    </div>

    <!-- Slogan -->
    <div class="form-group mb-4">
        <label for="slogan" class="block text-sm font-medium text-black">Slogan</label>
        <input type="text" name="slogan" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm text-black focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('slogan', $perfil->slogan ?? '') }}">
    </div>

    <!-- Descripción -->
    <div class="form-group mb-4">
        <label for="descripcion" class="block text-sm font-medium text-black">Descripción</label>
        <textarea name="descripcion" class="form-textarea mt-1 block w-full border-gray-300 rounded-md shadow-sm text-black focus:ring-indigo-500 focus:border-indigo-500">{{ old('descripcion', $perfil->descripcion ?? '') }}</textarea>
    </div>

    <!-- Logo -->
    <div class="form-group mb-4">
        <label for="logo" class="block text-sm font-medium text-black">Logo</label>
        <input type="file" name="logo" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm text-black">
        @if(isset($perfil->logo))
            <img src="{{ asset('storage/' . $perfil->logo) }}" alt="Logo" class="img-thumbnail mt-2" style="max-width: 200px;">
        @endif
    </div>

    <!-- Logo2 -->
    <div class="form-group mb-4">
        <label for="logo2" class="block text-sm font-medium text-black">Logo2</label>
        <input type="file" name="logo2" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm text-black">
        @if(isset($perfil->logo2))
            <img src="{{ asset('storage/' . $perfil->logo2) }}" alt="Logo2" class="img-thumbnail mt-2" style="max-width: 200px;">
        @endif
    </div>

    <!-- Imagen SEO -->
    <div class="form-group mb-4">
        <label for="seo" class="block text-sm font-medium text-black">Imagen SEO</label>
        <input type="file" name="seo" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm text-black">
        @if(isset($perfil->seo))
            <img src="{{ asset('storage/' . $perfil->seo) }}" alt="SEO" class="img-thumbnail mt-2" style="max-width: 200px;">
        @endif
    </div>

    <!-- Favicon -->
    <div class="form-group mb-4">
        <label for="favicon" class="block text-sm font-medium text-black">Favicon</label>
        <input type="file" name="favicon" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm text-black">
        @if(isset($perfil->favicon))
            <img src="{{ asset('storage/' . $perfil->favicon) }}" alt="Favicon" class="img-thumbnail mt-2" style="max-width: 50px;">
        @endif
    </div>

    <!-- Dirección -->
    <div class="form-group mb-4">
        <label for="direccion" class="block text-sm font-medium text-black">Dirección</label>
        <input type="text" name="direccion" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm text-black" value="{{ old('direccion', $perfil->direccion ?? '') }}">
    </div>

    <!-- Celular -->
    <div class="form-group mb-4">
        <label for="celular" class="block text-sm font-medium text-black">Celular</label>
        <input type="text" name="celular" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm text-black" value="{{ old('celular', $perfil->celular ?? '') }}">
    </div>

    <!-- Email -->
    <div class="form-group mb-4">
        <label for="email" class="block text-sm font-medium text-black">Email</label>
        <input type="email" name="email" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm text-black" value="{{ old('email', $perfil->email ?? '') }}">
    </div>

    <!-- Facebook -->
    <div class="form-group mb-4">
        <label for="facebook" class="block text-sm font-medium text-black">Facebook</label>
        <input type="text" name="facebook" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm text-black" value="{{ old('facebook', $perfil->facebook ?? '') }}">
    </div>

    <!-- TikTok -->
    <div class="form-group mb-4">
        <label for="tiktok" class="block text-sm font-medium text-black">TikTok</label>
        <input type="text" name="tiktok" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm text-black" value="{{ old('tiktok', $perfil->tiktok ?? '') }}">
    </div>

    <!-- Instagram -->
    <div class="form-group mb-4">
        <label for="instagram" class="block text-sm font-medium text-black">Instagram</label>
        <input type="text" name="instagram" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm text-black" value="{{ old('instagram', $perfil->instagram ?? '') }}">
    </div>

    <button type="submit" class="btn btn-primary py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
        Guardar Cambios
    </button>
</form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
