<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Clientes') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-6">
        <a href="{{ route('clientes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Agregar Cliente</a>

        <div class="bg-white shadow overflow-hidden rounded-lg">
            <table class="min-w-full table-auto border-collapse border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left">Nombre</th>
                        <th class="px-6 py-3 text-left">DNI</th>
                        <th class="px-6 py-3 text-left">Creado</th>
                        <th class="px-6 py-3 text-left">Modificado</th>
                        <th class="px-6 py-3 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr class="border-t">
                            <td class="px-6 py-4">{{ $cliente->persona->NOMBRES }} {{ $cliente->persona->APELLIDOS }}</td>
                            <td class="px-6 py-4">{{ $cliente->persona->DNI }}</td>
                            <td class="px-6 py-4">{{ $cliente->CREADO}}</td>
                            <td class="px-6 py-4">{{ $cliente->ACTUALIZADO }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('clientes.edit', $cliente->IDCLIENTE) }}" class="text-indigo-600 hover:underline">Editar</a>
                                <form action="{{ route('clientes.destroy', $cliente->IDCLIENTE) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
