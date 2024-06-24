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
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Explore Our Locations
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Click on any marker to view more details about the Island.
                    </p>
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

            // Create markers with a link to the contacts.index page in their popups
            L.marker(['10.220645', '484.038219']).addTo(map).bindPopup("<a href='" + PanganAn +
                "'>Pangn-an Island</a>");
            L.marker(['10.203614', '484.019508']).addTo(map).bindPopup("<a href='" + Cawhagan +
                "'>Cawhagan Island</a>");
            L.marker(['10.207999', '483.988609']).addTo(map).bindPopup("<a href='" + Gilutongan +
                "'>Gilutongan Island</a>");

            map.on('click', onMapClick);

            map.invalidateSize();
        });
    </script>
</x-app-layout>
