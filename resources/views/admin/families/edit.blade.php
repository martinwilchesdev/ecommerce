<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Familias',
        'route' => route('admin.families.index'),
    ],
    [
        'name' => $family->name,
    ],
]">
    <div class="card">
        <form action="{{ route('admin.families.update', $family) }}" method="POST">
            @csrf
            @method('PUT') {{-- como el formulario solo recibe POST o GET como valor de `method` se define el metodo de actualizacion mediante `@method` --}}
            <div class="mb-4">
                <x-label class="mb-2">Nombre</x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre de la familia" name="name"
                    value="{{ old('name', $family->name) }}" />
            </div>

            <div class="flex justify-end space-x-2">
                <x-danger-button onclick="confirmDelete()">Eliminar</x-danger-button>
                <x-button>Actualizar</x-button>
            </div>
        </form>
    </div>

    <form action="{{ route('admin.families.destroy', $family) }}" method="POST" id="delete-form">
        @csrf
        @method('DELETE')
    </form>

    {{-- directiva que admite codigo de javascript --}}
    @push('js')
        <script>
            // confirmar la eliminacion de una familia
            async function confirmDelete() {
                const deleteFamily = await Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Esta acción no se puede revertir",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Aceptar",
                    cancelButtonText: "Cancelar"
                })

                if (deleteFamily.isConfirmed) {
                    document.getElementById('delete-form').submit()
                }
            }
        </script>
    @endpush
</x-admin-layout>
