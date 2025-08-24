{{-- parametros recibidos por la plantilla --}}
@props(['breadcrumbs' => []]) {{-- por defecto el valor de la prop `breadcrumbs` sera un array vacio --}}

<!DOCTYPE html>
{{-- lang asigna el idioma de la aplicacion --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/fb829a2222.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

{{-- x-data // directiva de alpine --}}
{{-- sidebarOpen // variable inicializada en false, utilizada para mostrar u ocultasr el sidebar --}}

<body class="font-sans antialiased" :class="{
    'overflow-y-hidden': sidebarOpen
}" x-data="{
    sidebarOpen: false
}">
    {{-- x-on:click // directiva de alpine que permiten manejar el evento clic sobre el elemento referenciado --}}
    <div class="fixed inset-0 bg-gray-900 opacity-50 z-20 sm:hidden" style="display: none;" x-show="sidebarOpen"
        x-on:click="sidebarOpen = !sidebarOpen"></div>

    {{-- incluir partials en el layout --}}
    @include('layouts.partials.admin.navigation')
    @include('layouts.partials.admin.siderbar')

    <div class="p-4 sm:ml-64">
        <div class="mt-14">
            <div class="flex justify-between items-center">
                @include('layouts.partials.admin.breadcrumb')

                {{-- se recibe el slot con nombre --}}
                @isset($action)
                    <div>
                        {{ $action }}
                    </div>
                @endisset
            </div>
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                {{ $slot }}
            </div>
        </div>
    </div>

    {{-- sweet alert cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireScripts

    {{-- especifica que dentro del layout se podra ejecutar codigo de javascript, especificamente lo que se incluya dentro de una directiva `@push` --}}
    @stack('js')

    {{-- variable de sesion flash llamada `swal` --}}
    @if (session('swal'))
        <script>
            // `json_encode()` convierte el array PHP en un array valido de JavaScript

            Swal.fire({!! json_encode(session('swal')) !!})
        </script>
    @endif
</body>

</html>
