<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex flex-row items-center">
                {{ __('Gilutungan Island') }}
                @include('components.island')
            </div>

        </h2>
        <div class="flex flex-col sm:flex-row gap-3">
            <x-bladewind::statistic number="1,606 (2020)" label="Total population" />
            <x-bladewind::statistic number="0.050 sq mi" label="Total area" />
            <x-bladewind::statistic number="32,120/sq mi" label="Populity Density" />
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-50 to-blue-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl">
                <div class="p-6 sm:p-12">
                    <div class="mb-10">
                        <h2 class="font-semibold text-3xl text-blue-800 leading-tight mb-4">Gilutungan, Cebu</h2>
                        <p class="text-gray-700 mb-4 font-poppins">
                            Gilutungan is a small island located in the province of Cebu, Philippines.
                            It is known for its beautiful white sand beaches, crystal clear waters, and
                            vibrant marine life. The island is a popular destination for snorkeling and
                            diving enthusiasts, as it is home to a diverse range of coral reefs and
                            marine species.
                        </p>
                        <p class="text-gray-700 mb-4 font-poppins">
                            Apart from its natural beauty, Gilutungan also offers various recreational
                            activities such as island hopping, fishing, and beach volleyball. Visitors
                            can also indulge in delicious seafood dishes prepared by the locals.
                        </p>
                        <p class="text-gray-700 font-poppins">
                            Whether you're looking for a relaxing beach getaway or an adventurous
                            underwater exploration, Gilutungan is the perfect destination for you. Plan
                            your trip now and experience the beauty of this hidden gem in Cebu!
                        </p>
                    </div>

                    <div class="flex justify-center py-10 rounded-lg">
                        <div
                            class="flex flex-col lg:flex-row justify-center items-start space-y-4 lg:space-y-0 lg:space-x-4 w-full md:w-11/12 lg:w-10/12">
                            <!-- Video Container -->
                            <div class="w-full">
                                <div class="m-5 relative bg-white rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300 ease-in-out"
                                    style="padding-bottom: 56.25%; height: 0;">
                                    <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                        src="https://www.youtube.com/embed/cPLhdCfNmrI?si=OH0buiwQV0hXnk3a"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>

                                <div class="m-5 relative bg-white rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300 ease-in-out"
                                    style="padding-bottom: 56.25%; height: 0;">
                                    <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                        src="https://www.youtube.com/embed/8Dm7wKaOEb0?si=RsqkSiYppkpWv8__"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
</x-app-layout>
