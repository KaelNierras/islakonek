<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Islands') }}
        </h2>
    </x-slot>
    @include('components.notifications')
    <div class="py-5 md:py-12 content">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-2 bg-white shadow-sm py-4 rounded-xl">
            @livewire('island-table')
        </div>
    </div>

    @livewireScripts
    <script>
        function showModalEdit(modalId) {
            showModal(modalId);
        }

        function confirmDelete () {
            domEl('.delete-form').submit();
        }
    </script>
</x-app-layout>
