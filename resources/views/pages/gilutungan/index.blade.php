<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex flex-row items-center">
                {{ __('Gilutungan Island') }} 
                @include('components.island')
            </div>
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-50 to-blue-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-12">
                    <div class="mb-10">
                        <h2 class="font-semibold text-3xl text-blue-800 leading-tight mb-4">Gilutungan, Cebu</h2>
                        <p class="text-gray-700 mb-4">
                            Gilutungan is a small island located in the province of Cebu, Philippines.
                            It is known for its beautiful white sand beaches, crystal clear waters, and
                            vibrant marine life. The island is a popular destination for snorkeling and
                            diving enthusiasts, as it is home to a diverse range of coral reefs and
                            marine species.
                        </p>
                        <p class="text-gray-700 mb-4">
                            Apart from its natural beauty, Gilutungan also offers various recreational
                            activities such as island hopping, fishing, and beach volleyball. Visitors
                            can also indulge in delicious seafood dishes prepared by the locals.
                        </p>
                        <p class="text-gray-700">
                            Whether you're looking for a relaxing beach getaway or an adventurous
                            underwater exploration, Gilutungan is the perfect destination for you. Plan
                            your trip now and experience the beauty of this hidden gem in Cebu!
                        </p>
                    </div>
                    <div class="flex justify-center bg-blue-50 py-10 rounded-lg">
                        <div class="w-full md:w-8/12 lg:w-6/12">
                            <div class="mb-4 text-center">
                                <h3 class="text-2xl font-semibold text-blue-800">Embark on a Journey to Gilutungan Island</h3>
                                <p class="text-md text-blue-700">Experience the vibrant marine life and pristine beaches of Gilutungan, a paradise for divers and beach lovers alike.</p>
                            </div>
                            <div class="relative bg-white rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300 ease-in-out" style="padding-bottom: 56.25%; height: 0;">
                                <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="https://www.youtube.com/embed/cPLhdCfNmrI?si=OH0buiwQV0hXnk3a" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>