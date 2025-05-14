<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Cliente') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-6">
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('clientes.store') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700">Nombres</label>
                <input type="text" name="NOMBRES" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700">Apellidos</label>
                <input type="text" name="APELLIDOS" class="w-full border rounded px-3 py-2" required>
            </div>
             <!-- desactivado el required por ser simple -->
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700">DNI</label>
                <input type="text" name="DNI" class="w-full border rounded px-3 py-2"  maxlength="8">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
            </div>
        </form>
    </div>
</x-app-layout>
