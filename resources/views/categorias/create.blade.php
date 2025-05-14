<div x-data="{ open: false }">
    <!-- Botón para abrir el modal -->
    <button @click="open = true" class="bg-blue-500 text-white px-4 py-2 rounded">
        + Crear nueva categoría
    </button>

    <!-- Modal -->
    <div
        x-show="open"
        x-transition
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
        @click.away="open = false"
    >
        <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold mb-4">Crear Categoría</h2>

            <!-- Formulario -->
            <form method="POST" action="{{ route('categorias.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="NOMBCATEGORIA" class="block text-gray-700">Nombre de la categoría</label>
                    <input type="text" id="NOMBCATEGORIA" name="NOMBCATEGORIA" class="w-full mt-1 p-2 border border-gray-300 rounded" required>
                </div>

                <div class="flex justify-end gap-2">
                    <!-- Botón para cerrar el modal -->
                    <button type="button" @click="open = false" class="px-4 py-2 bg-gray-300 rounded">
                        Cancelar
                    </button>
                    <!-- Botón para enviar el formulario -->
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
