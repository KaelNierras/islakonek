<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex flex-row items-center">
                {{ __('Cawhagan Island') }} 
                @include('components.island')
            </div>
        </h2>
        <div class="flex flex-col sm:flex-row gap-3">
            <x-bladewind::statistic number="694 (2020)" label="Total population" />
            <x-bladewind::statistic number="0.019 sq mi" label="Total area" />
            <x-bladewind::statistic number="36,526/sq mi" label="Populity Density" />
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-50 to-blue-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl">
                <div class="p-6 sm:p-12">
                    <div class="mb-10">
                        <h2 class="font-semibold text-3xl text-blue-800 leading-tight mb-4">Cawhagan, Cebu</h2>
                        <p class="text-gray-700 mb-4 font-poppins">
                            Cawhagan is a serene island located in the province of Cebu, Philippines. Renowned for its untouched natural beauty, the island boasts pristine white sand beaches surrounded by turquoise waters. It is an idyllic destination for those seeking peace and tranquility away from the hustle and bustle of city life.
                        </p>
                        <p class="text-gray-700 mb-4 font-poppins">
                            The island is less commercialized compared to other tourist spots, offering visitors a unique opportunity to experience the local lifestyle. Activities include snorkeling in its clear waters, exploring the rich marine life, and enjoying the simplicity of island living. Cawhagan is also a great place for picnics, sunbathing, and just soaking in the breathtaking scenery.
                        </p>
                        <p class="text-gray-700 font-poppins">
                            For an authentic island experience, immerse yourself in the local culture by engaging with the community and trying out traditional Cebuano dishes. Cawhagan is not just a destination but a peaceful retreat for those looking to reconnect with nature and experience genuine Filipino hospitality.
                        </p>
                    </div>
                    

                    <div class="flex justify-center py-10 rounded-lg">
                        <div class="flex flex-col lg:flex-row justify-center items-start space-y-4 lg:space-y-0 lg:space-x-4 w-full md:w-11/12 lg:w-10/12">
                            <!-- Video Container -->
                            <div class="w-full lg:w-3/4">
                                <div class="m-3 relative bg-white rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300 ease-in-out"
                                    style="padding-bottom: 56.25%; height: 0;">
                                    <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="https://www.youtube.com/embed/pcFcbjUM2nc?si=mOtuI-4aOqukyZs1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                                <div class="m-3 relative bg-white rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300 ease-in-out"
                                    style="padding-bottom: 56.25%; height: 0;">
                                    <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="https://www.youtube.com/embed/SeFJjbBjkT8?si=McfzKddZS0UTnh3n" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            </div>

                            <!-- Itinerary Timeline Container -->
                            <div class="w-full lg:w-1/2">
                                @include('components.itinerary')
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>