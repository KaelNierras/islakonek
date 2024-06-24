<section class="py-8">
    <!-- Itinerary Timeline Container -->
    <div class="w-full max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Itinerary Timeline</h2>
        <div class="relative before:absolute before:top-0 before:bottom-0 before:left-1/2 before:w-0.5 before:bg-gray-300 before:transform before:-translate-x-1/2">
            @php
                $days = [
                    "Day 1" => "Arrival and Exploration",
                    "Day 2" => "Beach Day and Water Activities",
                    "Day 3" => "Island Hopping and Sightseeing",
                    "Day 4" => "Cultural Immersion and Adventure",
                    "Day 5" => "Relaxation and Departure",
                ];
            @endphp
            @foreach ($days as $date => $content)
                <div class="mb-8 flex justify-between items-center w-full right-timeline">
                    <div class="order-1 w-5/12"></div>
                    <div class="z-20 flex items-center order-1 bg-blue-500 shadow-xl w-8 h-8 rounded-full">
                        <h1 class="mx-auto font-semibold text-lg text-white">{{ $loop->iteration }}</h1>
                    </div>
                    <div class="order-1 bg-blue-100 rounded-lg shadow-xl w-5/12 px-6 py-4">
                        <h3 class="mb-1 font-bold text-blue-800 text-xl">{{ $date }}</h3>
                        <p class="text-sm leading-snug tracking-wide text-gray-900 text-opacity-100">{{ $content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>