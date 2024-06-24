<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Islands') }}
        </h2>
    </x-slot>

    @include('pages.island.partials.add-island-modal')

    <div class="py-5 md:py-12 content">
        <div class="max-w-7xl mx-auto h-full sm:px-6 lg:px-8">
            <div class="shadow-sm sm:rounded-lg h-full">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                    <!-- Table Title and Subtitle -->
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Island Table
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            This table shows the list of islands.
                        </p>
                    </div>
                    <!-- Add Button -->
                    <x-bladewind::button onclick="showModal('add-island')">
                        Add Island
                    </x-bladewind::button>
                </div>
                <div class="flex flex-col gap-4 m-3">
                    <x-bladewind::table exclude_columns="id" searchable="true" search_placeholder="Search..."
                        :data="$islands" class="rounded"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
