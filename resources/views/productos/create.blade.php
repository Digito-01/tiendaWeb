<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Producto') }}
        </h2>
    </x-slot>

    <div class="bg-gray-50 rounded-xl shadow p-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">{{ __('Crear Producto') }}</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="NOMBPRODUCTO" class="block text-gray-800">{{ __('Nombre del Producto') }}</label>
                <input type="text" name="NOMBPRODUCTO" id="NOMBPRODUCTO" class="w-full mt-2 p-2 border rounded" value="{{ old('NOMBPRODUCTO') }}" required>
            </div>
            <div class="mb-4">
                <label for="PRECIO" class="block text-gray-800">{{ __('Precio') }}</label>
                <input type="number" name="PRECIO" id="PRECIO" class="w-full mt-2 p-2 border rounded" value="{{ old('PRECIO') }}" required>
            </div>
            <div class="mb-4">
                <label for="IDCATEGORIA" class="block text-gray-800">{{ __('Categoría') }}</label>
                <select name="IDCATEGORIA" id="IDCATEGORIA" class="w-full mt-2 p-2 border rounded" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->IDCATEGORIA }}">{{ $categoria->NOMBCATEGORIA }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">{{ __('Guardar') }}</button>
        </form>
    </div>
</x-app-layout>
