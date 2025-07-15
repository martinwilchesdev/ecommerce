<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorias',
        'route' => route('admin.categories.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">
    <div class="card">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <x-validation-errors class="mb-2"></x-validation-errors>

            <div class="mb-4">
                <x-label class="mb-2">Familia</x-label>
                <x-select name="family_id" class="w-full">

                    @foreach ($families as $family)
                        <option value="{{ $family->id }}">{{ $family->name }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label class="mb-2">Nombre</x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre de la categoria" name="name"
                    value="{{ old('name') }}" />
            </div>

            <div class="flex justify-end">
                <x-button>Guardar</x-button>
            </div>
        </form>
    </div>
</x-admin-layout>
