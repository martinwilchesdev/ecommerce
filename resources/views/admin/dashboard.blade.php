<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard')
    ]
]">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex items-center">
                <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}" />
                <div class="ml-4 flex-1">
                    {{-- auth()->user() // helper que permite recuperar la informacion del usuario que ha iniciado sesion --}}
                    <h2 class="text-lg font-semibold">Bienvenido, {{ auth()->user()->name }}</h2>
                    <form action={{ route('logout') }} method="POST">
                        @csrf
                        <button class="text-sm hover:text-blue-500">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 flex justify-center items-center">
            <h2 class="text-xl font-semibold">
                Laravel Shop
            </h2>
        </div>
    </div>
</x-admin-layout>
