<div>
    {{-- Errores de validación --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Mensajes de sesión dinámicos --}}
    @php
        $alertTypes = [
            'success' => 'bg-green-100 text-green-800',
            'error' => 'bg-red-100 text-red-800',
            'danger' => 'bg-red-100 text-red-800',
            'warning' => 'bg-yellow-100 text-yellow-800',
            'info' => 'bg-blue-100 text-blue-800',
            'status' => 'bg-blue-100 text-blue-800',
            'message' => 'bg-blue-100 text-blue-800',
            'alert' => 'bg-yellow-100 text-yellow-800',
        ];
    @endphp

    @foreach ($alertTypes as $key => $classes)
        @if(session($key))
            <div class="{{ $classes }} p-4 rounded mb-4">
                {{ session($key) }}
            </div>
        @endif
    @endforeach
</div>
