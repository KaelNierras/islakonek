<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex flex-row items-center">
                {{ __('Pangan-an Island') }} 
                @include('components.island')
            </div>
        </h2>
        <div class="flex flex-col sm:flex-row gap-3">
            <x-bladewind::statistic number="2,348 (2020)" label="Total population" />
            <x-bladewind::statistic number="0.386102 sq mi" label="Total area" />
            <x-bladewind::statistic number="6,082/sq mi" label="Populity Density" />
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-50 to-blue-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-12">
                    <div class="mb-10">
                        <h2 class="font-semibold text-3xl text-blue-800 leading-tight mb-4">Pangan-an, Cebu</h2>
                        <p class="text-gray-700 mb-4">
                            Pangan-an is an enchanting island located off the coast of Cebu, Philippines. Known for its pristine beaches and untouched natural landscapes, Pangan-an offers a tranquil escape for those seeking peace and relaxation. The island's clear blue waters and vibrant coral reefs make it an ideal spot for snorkeling and diving enthusiasts.
                        </p>
                        <p class="text-gray-700 mb-4">
                            The island is also home to a small, welcoming community that offers a glimpse into the traditional island lifestyle. Visitors can enjoy fresh seafood, explore the local culture, and experience the warmth of Filipino hospitality. With its stunning natural beauty and serene atmosphere, Pangan-an is a hidden gem waiting to be discovered.
                        </p>
                        <p class="text-gray-700">
                            Whether you're looking to unwind on the beach, explore the underwater world, or simply soak in the natural beauty, Pangan-an provides a perfect backdrop for a memorable getaway. Plan your visit and discover the charm of this secluded paradise in Cebu.
                        </p>
                    </div>
                    <div class="flex justify-center bg-blue-50 py-10 rounded-lg">
                        <div class="w-full md:w-8/12 lg:w-6/12">
                            <div class="mb-4 text-center">
                                <h3 class="text-2xl font-semibold text-blue-800">Explore the Hidden Gem of Pangan-an Island</h3>
                                <p class="text-md text-blue-700">Step into the untouched paradise of Pangan-an and experience its breathtaking beauty.</p>
                            </div>
                            <div class="relative bg-white rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300 ease-in-out" style="padding-bottom: 56.25%; height: 0;">
                                <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="https://www.youtube.com/embed/DmAQsEpkS8g?si=Znl8rEBehfGTz__S" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>