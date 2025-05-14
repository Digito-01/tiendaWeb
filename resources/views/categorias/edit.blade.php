<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Categoría') }}
        </h2>
    </x-slot>

    <div class="bg-white rounded-xl shadow p-6 max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Editar Categoría</h2>

        <form action="{{ route('categorias.update', $categoria->IDCATEGORIA) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="NOMBCATEGORIA" class="block text-gray-700 font-medium">Nombre de la Categoría</label>
                <input
                    type="text"
                    name="NOMBCATEGORIA"
                    id="NOMBCATEGORIA"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('NOMBCATEGORIA', $categoria->NOMBCATEGORIA) }}"
                    required
                >
            </div>

            <div class="flex justify-end">
                <a href="{{ route('categorias.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">Cancelar</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                    Actualizar Categoría
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
