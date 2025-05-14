<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorías') }}
        </h2>
    </x-slot>

    <div class="bg-gray-50 rounded-xl shadow p-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">{{ __('Categorías') }}</h2>
        <!-- Modal para nueva categoria -->
        <div class="flex justify-end mb-4">
        @include('categorias.create')
         </div>
        <!-- Fin del modal -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
    
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="px-4 py-2 border border-gray-300 text-gray-800">ID</th>
                        <th class="px-4 py-2 border border-gray-300 text-gray-800">Nombre</th>
                        <th class="px-4 py-2 border border-gray-300 text-gray-800">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300 text-gray-800">{{ $categoria->IDCATEGORIA }}</td>
                            <td class="px-4 py-2 border border-gray-300 text-gray-800">{{ $categoria->NOMBCATEGORIA }}</td>
                            <td class="px-4 py-2 border border-gray-300 text-gray-800">
                                <a href="{{ route('categorias.edit', $categoria->IDCATEGORIA) }}" class="text-blue-500 hover:underline">Editar</a> |
                                <form action="{{ route('categorias.destroy', $categoria->IDCATEGORIA) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </>
</x-app-layout>
