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
        'name' => $category->name,
    ],
]">
    <div class="card">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <x-validation-errors class="mb-2"></x-validation-errors>

            <div class="mb-4">
                <x-label class="mb-2">Familia</x-label>
                <x-select name="family_id" class="w-full">

                    @foreach ($families as $family)
                        {{-- old('') // recibe como parametro el valor original cargado en el select. Si hay un error de validacion se sigue mostrando dicho valor por defecto --}}
                        <option value="{{ $family->id }}" @selected(old('family_id') ?? $category->family_id === $family->id)>
                            {{ $family->name }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label class="mb-2">Nombre</x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre de la categoria" name="name"
                    value="{{ old('name', $category->name) }}" />
            </div>

            <div class="flex justify-end">
                <x-danger-button onclick="confirmDelete()">Eliminar</x-danger-button>
                <x-button class="ml-2">Actualizar</x-button>
            </div>
        </form>
    </div>

    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" id="delete-form">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            async function confirmDelete() {
                const deleteCategory = await Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Esta acción no se puede revertir",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Aceptar",
                    cancelButtonText: "Cancelar"
                })

                if (deleteCategory.isConfirmed) {
                    document.getElementById('delete-form').submit()
                }
            }
        </script>
    @endpush
</x-admin-layout>
