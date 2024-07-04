<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex flex-row items-center">
                {{ __($selectedIsland->name) }}
                @include('components.island')
            </div>
        </h2>
        <div class="flex flex-col sm:flex-row gap-3">
            <x-bladewind::statistic number="{{ $selectedIsland->total_population }}" label="Total population" />
            <x-bladewind::statistic number="{{ $selectedIsland->total_area }} sq mi" label="Total area" />
            <x-bladewind::statistic number="{{ $selectedIsland->population_density }} sq mi" label="Populity Density" />
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-50 to-blue-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl">
                <div class="p-6 sm:p-12">

                    <div class="mb-5">
                        <h2 class="font-semibold text-3xl text-blue-800 leading-tight mb-4">{{ $selectedIsland->name }}</h2>
                        <p class="text-gray-700 mb-4 font-poppins">
                            {{ $selectedIsland->description }}
                        </p>
                    </div>
                    @include('components.itinerary')
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
