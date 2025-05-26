@php
    function sortUrl($column, $currentSort, $currentDirection) {
        $direction = ($currentSort === $column && $currentDirection === 'asc') ? 'desc' : 'asc';
        return request()->fullUrlWithQuery([
            'sortBy' => $column,
            'sortDirection' => $direction
        ]);
    }
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 p-4">
                <form method="GET" action="{{ route('productos.index') }}" class="flex items-center gap-2 w-full md:w-auto">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar producto..." class="border border-gray-300 rounded px-3 py-2 w-full md:w-64 focus:outline-none focus:ring focus:border-blue-300">
        
                    <input type="hidden" name="sortBy" value="{{ request('sortBy', 'IDPRODUCTO') }}">
                    <input type="hidden" name="sortDirection" value="{{ request('sortDirection', 'asc') }}">
                    
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Buscar
                    </button>
                </form>
                <a href="{{ route('productos.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"> Agregar Producto </a>
            </div>
            <!-- alertas --> <x-alertas /> <!-- Fin de alertas -->
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-300 text-left text-gray-800 font-semibold">
                            <a href="{{ sortUrl('NOMBPRODUCTO', request('sortBy'), request('sortDirection')) }}" class="hover:underline">
                                {{ __('Nombre') }}
                                @if (request('sortBy') === 'NOMBPRODUCTO')
                                    <span class="text-xs">{{ request('sortDirection') === 'asc' ? '↑' : '↓' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="px-6 py-3 border-b border-gray-300 text-left text-gray-800 font-semibold">
                            <a href="{{ sortUrl('IDCATEGORIA', request('sortBy'), request('sortDirection')) }}" class="hover:underline">
                                {{ __('Categoría') }}
                                @if (request('sortBy') === 'IDCATEGORIA')
                                    <span class="text-xs">{{ request('sortDirection') === 'asc' ? '↑' : '↓' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="px-6 py-3 border-b border-gray-300 text-left text-gray-800 font-semibold">
                            <a href="{{ sortUrl('PRECIO', request('sortBy'), request('sortDirection')) }}" class="hover:underline">
                                {{ __('Precio') }}
                                @if (request('sortBy') === 'PRECIO')
                                    <span class="text-xs">{{ request('sortDirection') === 'asc' ? '↑' : '↓' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="px-6 py-3 border-b border-gray-300 text-center text-gray-800 font-semibold">{{ __('Acciones') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($productos as $producto)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $producto->NOMBPRODUCTO }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $producto->categoria->NOMBCATEGORIA ?? __('Sin categoría') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ number_format($producto->PRECIO, 2) }} $</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <a href="{{ route('productos.edit', $producto->IDPRODUCTO) }}" class="text-indigo-600 hover:underline mr-3">{{ __('Editar') }}</a>
                                <form action="{{ route('productos.destroy', $producto->IDPRODUCTO) }}" method="POST" class="inline-block" onsubmit="return confirm('{{ __('¿Estás seguro de que deseas eliminar este producto?') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">{{ __('Eliminar') }}</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">{{ __('No hay productos registrados.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="px-6 py-4">
                                {{ $productos->links() }}
                            </td>
                        </tr>
                    </tfoot>
            </table>
        </div>
    </div>
</x-app-layout>
