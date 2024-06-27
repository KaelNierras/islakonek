<section class="py-4 sm:py-8">
    <!-- Itinerary Timeline Container -->
    <div class="w-full max-w-xl mx-auto sm:max-w-4xl">
        <div class="relative ">
            @php
                $days = [
                    'Day 1' => [
                        'content' => 'Arrival and Exploration',
                        'imageUrl' => 'https://img.freepik.com/free-photo/full-shot-travel-concept-with-landmarks_23-2149153258.jpg?t=st=1719476516~exp=1719480116~hmac=0bf7397500181036f288a98684c32fd7afcc51d5c18cdb84e43f74e58049ca00&w=1380',
                    ],
                    'Day 2' => [
                        'content' => 'Beach Day and Water Activities',
                        'imageUrl' => 'https://img.freepik.com/free-photo/people-surfing-brazil_23-2151079380.jpg?t=st=1719477801~exp=1719481401~hmac=3589c4c509f82e7bc1bbacb2fe2c6db1793739e6cde0e41aa0a71d9f2f262b05&w=1380',
                    ],
                    'Day 3' => [
                        'content' => 'Island Hopping and Sightseeing',
                        'imageUrl' => 'https://img.freepik.com/free-photo/cropped-rear-shot-fashionable-male-model-wearing-black-hat-t-shirt-shorts-standing-sand-front-rocky-cliff-middle-ocean-while-posing-beach_273609-1794.jpg?t=st=1719477856~exp=1719481456~hmac=c41faba9dfc8160704f49c37aef7387f9d66b8a13b1aa57a6519def33a36eb3d&w=1380',
                    ],
                    'Day 4' => [
                        'content' => 'Cultural Immersion and Adventure',
                        'imageUrl' => 'https://img.freepik.com/free-photo/balinese-people-traditional-clothes-religious-ceremony-pura-taman-ayun-temple-bali-indonesia_335224-390.jpg?t=st=1719477920~exp=1719481520~hmac=5edb3f4939855d2017d8d3a123ebc6ac24b4c65443d9b1aa0e4e27217233fbef&w=1380',
                    ],
                    'Day 5' => [
                        'content' => 'Relaxation and Departure',
                        'imageUrl' => 'https://img.freepik.com/free-photo/female-meditating-indoor-portrait_23-2148835414.jpg?t=st=1719477952~exp=1719481552~hmac=75aa7dab0be8278f1a1041013ac9764519177769bd631ff4167d2cc7cdf28190&w=1380',
                    ],
                ];
            @endphp
            <div class="flex flex-col sm:flex-row sm:justify-between items-center justify-center mx-auto">
                @foreach ($days as $date => $day)
                    <div class="flex flex-col mb-4 sm:mb-8 sm:flex-row justify-center items-center w-full group">
                        <div class="relative bg-blue-100 rounded-lg shadow-xl px-4 py-3 sm:px-6 sm:py-4 mt-2 sm:mt-4 sm:ml-4 transition-transform duration-200 hover:scale-125 hover:cursor-pointer hover:z-50">
                            <img src="{{ $day['imageUrl'] }}" alt="Day Image" class="absolute top-0 left-0 w-full h-full rounded-lg object-cover opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <h3 class="mb-1 font-bold text-blue-800 text-lg sm:text-xl z-10">{{ $date }}</h3>
                            <p class="text-sm leading-snug tracking-wide text-gray-900 text-opacity-100 z-10">
                                {{ $day['content'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>