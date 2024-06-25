<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Islands') }}
        </h2>
    </x-slot>
    @include('components.notifications')
    <div class="py-5 md:py-12 content">
        <div class="max-w-7xl mx-auto h-full sm:px-6 lg:px-8">
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
