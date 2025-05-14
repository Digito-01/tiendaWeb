<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="flex flex-col min-h-screen text-gray-800 bg-gray-100 antialiased">

    {{-- Navegación --}}
    @include('layouts.navigation')

    {{-- Contenido principal --}}
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            {{ $slot }}
        </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-800 text-white text-sm py-4 text-center mt-8">
        <p>&copy; {{ date('Y') }} Sistema de Productos. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
