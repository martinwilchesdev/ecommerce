<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard')
    ],
    [
        'name' => 'Subcategorías',
        'route' => route('admin.subcategories.index')
    ],
    [
        'name' => 'Nuevo'
    ]
]">

</x-admin-layout>
