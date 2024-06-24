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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl">
                <div class="p-6 sm:p-12">
                    <div class="mb-10">
                        <h2 class="font-semibold text-3xl text-blue-800 leading-tight mb-4">Pangan-an, Cebu</h2>
                        <p class="text-gray-700 mb-4 font-poppins">
                            Pangan-an is an enchanting island located off the coast of Cebu, Philippines. Known for its
                            pristine beaches and untouched natural landscapes, Pangan-an offers a tranquil escape for
                            those seeking peace and relaxation. The island's clear blue waters and vibrant coral reefs
                            make it an ideal spot for snorkeling and diving enthusiasts.
                        </p>
                        <p class="text-gray-700 mb-4 font-poppins">
                            The island is also home to a small, welcoming community that offers a glimpse into the
                            traditional island lifestyle. Visitors can enjoy fresh seafood, explore the local culture,
                            and experience the warmth of Filipino hospitality. With its stunning natural beauty and
                            serene atmosphere, Pangan-an is a hidden gem waiting to be discovered.
                        </p>
                        <p class="text-gray-700 font-poppins">
                            Whether you're looking to unwind on the beach, explore the underwater world, or simply soak
                            in the natural beauty, Pangan-an provides a perfect backdrop for a memorable getaway. Plan
                            your visit and discover the charm of this secluded paradise in Cebu.
                        </p>
                    </div>
                    <div class="flex justify-center py-10 rounded-lg">
                        <div
                            class="flex flex-col lg:flex-row justify-center items-start space-y-4 lg:space-y-0 lg:space-x-4 w-full md:w-11/12 lg:w-10/12">
                            <!-- Video Container -->
                            <div class="w-full sm:w-1/2">
                                <div class="m-5 relative bg-white rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300 ease-in-out"
                                    style="padding-bottom: 56.25%; height: 0;">
                                    <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                        src="https://www.youtube.com/embed/DmAQsEpkS8g?si=Znl8rEBehfGTz__S"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                                <div class="m-5 relative bg-white rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300 ease-in-out"
                                    style="padding-bottom: 56.25%; height: 0;">
                                    <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                        src="https://www.youtube.com/embed/tOn47n8KsXs?si=IEDD7xKtf_gVGNfw"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            </div>
                            <!-- Itinerary Timeline Container -->
                            @include('components.itinerary')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
