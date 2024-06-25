<section>
    <x-bladewind::modal  backdrop_can_close="false" name="add-island" size="xl" ok_button_action="saveIsland()"
        ok_button_label="Add" close_after_action="false">

        <form method="post" action="{{ route('island.store') }}" class="add-island-form">
            @csrf
            <h2 class="mt-0 text-3xl">Add Island</h2>
            <!-- Instruction for users to manually input island name -->
            <p class="text-start text-red-500 mt-4">Please manually input the island name below.</p>
            <div class="grid grid-cols-2 gap-4">
                <x-bladewind::input required="true" name="name" error_message="Please enter island name"
                    class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200"
                    label="Island name" />
            </div>

            <div class="grid grid-cols-2 gap-4 mt-0">
                <x-bladewind::input required="true" name="longitude"
                    class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200"
                    error_message="Please enter your longitude coordinates" label="Longitude" />

                <x-bladewind::input required="true" name="latitude"
                    class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200"
                    error_message="Please enter your latitude coordinates" label="Latitude" />
            </div>
            <!-- Instruction for users -->
            <p class="text-center mt-4 text-red-500">Click on the map to automatically set the longitude and latitude.
            </p>
            <div id="map" class="z-10"></div>
            <!-- Button to trigger invalidateSize -->
            <button type="button" onclick="invalidateMapSize()" class="mt-4">Adjust Map Display</button>
        </form>
    </x-bladewind::modal>

    <script>
        function saveIsland() {
            if (validateForm('.add-island-form')) {
                domEl('.add-island-form').submit();
            } else {
                return false;
            }
        }

        // Initialize the map in edit mode
        var map = L.map('map').setView(['10.210334', '484.017448'], 14);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        document.addEventListener('DOMContentLoaded', function() {
            // Invalidate size after the map is initialized
            map.invalidateSize();
            invalidateMapSize()
        });

        var popup = L.popup();

        function onMapClick(e) {
            var lat = parseFloat(e.latlng.lat.toFixed(6));
            var lng = parseFloat(e.latlng.lng.toFixed(6));

            document.querySelector('input[name="longitude"]').value = lat;
            document.querySelector('input[name="latitude"]').value = lng;

            popup
                .setLatLng(e.latlng)
                .setContent("Coordinates set to: " + e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);

        function invalidateMapSize() {
            map.invalidateSize();
        }
    </script>
</section>
