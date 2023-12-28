<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Mis Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
                <div class="p-2 mt-2 font-bold text-green-600 bg-green-100 border-l-4 border-green-600">
                    {{ session('mensaje') }}
                </div>
            @endif

            <livewire:mostrar-vacantes />
        </div>
    </div>
</x-app-layout>
