<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-2xl font-bold mb-4">{{ __('Editar Producto') }}</h2>

        <form action="{{ route('productos.update', $producto->IDPRODUCTO) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="NOMBPRODUCTO" class="block text-gray-700">{{ __('Nombre del Producto') }}</label>
                <input type="text" name="NOMBPRODUCTO" id="NOMBPRODUCTO" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ old('NOMBPRODUCTO', $producto->NOMBPRODUCTO) }}" required>
            </div>

            <div class="mb-4">
                <label for="PRECIO" class="block text-gray-700">{{ __('Precio') }}</label>
                <input type="number" name="PRECIO" id="PRECIO" class="mt-1 block w-full border-gray-300 rounded-md" step="0.01" value="{{ old('PRECIO', $producto->PRECIO) }}" required>
            </div>

            <div class="mb-4">
                <label for="IDCATEGORIA" class="block text-gray-700">{{ __('Categoría') }}</label>
                <select name="IDCATEGORIA" id="IDCATEGORIA" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    <option value="">{{ __('Seleccionar categoría') }}</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->IDCATEGORIA }}" {{ $producto->IDCATEGORIA == $categoria->IDCATEGORIA ? 'selected' : '' }}>{{ $categoria->NOMBCATEGORIA }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ __('Actualizar Producto') }}</button>
        </form>
    </div>
</x-app-layout>
