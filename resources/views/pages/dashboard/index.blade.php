<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('pages.dashboard.partials.dashboard-statistic')

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-20 sm:mb-0">
                <div class="p-6 text-gray-900">
                    <!-- Header and descriptive text added here -->
                    <div class="flex flex-row justify-between">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Explore Our Locations
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                Click on any marker to view more details about the Island.
                            </p>
                        </div>
                    </div>
                    <div id="map" class="z-10 mt-4"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("Initializing map...");

            var popup = L.popup();

            function onMapClick(e) {
                popup
                    .setLatLng(e.latlng)
                    .setContent("You clicked the map at " + e.latlng.toString())
                    .openOn(map);
            }

            var map = L.map('map').setView(['10.210334', '484.017448'], 14);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Generate the URL for the contacts.index route
            var PanganAn = "{{ route('pangan-an') }}";
            var Cawhagan = "{{ route('cawhagan') }}";
            var Gilutongan = "{{ route('gilutungan') }}";

            // // Create markers with a link to the contacts.index page in their popups
            // L.marker(['10.220645', '484.038219']).addTo(map).bindPopup("<a href='" + PanganAn +
            //     "'>Pangn-an Island</a>");
            // L.marker(['10.203614', '484.019508']).addTo(map).bindPopup("<a href='" + Cawhagan +
            //     "'>Cawhagan Island</a>");
            // L.marker(['10.207999', '483.988609']).addTo(map).bindPopup("<a href='" + Gilutongan +
            //     "'>Gilutongan Island</a>");

            @foreach ($islands as $island)
                var marker = L.marker(['{{ $island->latitude }}', '{{ $island->longitude }}']).addTo(map).bindPopup(
                    "<b>{{ $island->name }}</b><br>" +
                    "Total Area: {{ $island->total_area }}<br>" +
                    "Total Population: {{ $island->total_population }}<br>" +
                    "Population Density: {{ $island->population_density }}<br>" +
                    "<a href='{{ route('island.show', $island->id) }}'>More Info</a>"
                );

                // Add mouseover event listener to show popup on hover
                marker.on('mouseover', function(e) {
                    this.openPopup();
                });

                // Uncommented and corrected the mouseout event listener
                // marker.on('mouseout', function(e) {
                //     this.closePopup();
                // });
            @endforeach

            map.on('click', onMapClick);

            function showMoreInfo(islandId) {
                // Your JavaScript code to show more information about the island
                console.log("Showing more info for island ID:", islandId);
                // For example, you might display a modal or navigate to a different part of your application
            }

            map.invalidateSize();
        });
    </script>
</x-app-layout>
