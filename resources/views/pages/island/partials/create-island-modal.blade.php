<section>
    <x-bladewind::modal backdrop_can_close="false" name="add-island" size="xl" ok_button_action="saveIsland()"
        ok_button_label="Add" close_after_action="false">

        <div class="modal-content-scroll px-2 md:px-8">
            <form method="post" action="{{ route('island.store') }}" class="add-island-form">
                @csrf
                <h2 class="mt-0 text-3xl">Add Island</h2>
                <!-- Instruction for users to manually input island name -->
                <p class="text-start text-red-500 my-4">Please manually input the island name below.</p>
                <div class="grid grid-cols-1 gap-4">
                    <x-bladewind::input required="true" name="name" error_message="Please enter island name"
                        class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200"
                        label="Island name" />
                </div>

                <div class="grid grid-cols-2 gap-4 mt-0">
                    <x-bladewind::input required="true" name="latitude"
                        class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200"
                        error_message="Please enter your latitude coordinates" label="Latitude" />
                    <x-bladewind::input required="true" name="longitude"
                        class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200"
                        error_message="Please enter your longitude coordinates" label="Longitude" />
                </div>
                <div class="grid grid-cols-2 gap-4 mt-0">
                    <x-bladewind::input required="true" name="total_area"
                        class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200"
                        error_message="Please enter total area" label="Total area" />
                    <x-bladewind::input required="true" name="total_population"
                        class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200"
                        error_message="Please enter total population" label="Total population" />
                </div>
                <div class="grid grid-cols-1 gap-4 mt-0">
                    <x-bladewind::textarea required="true" name="description"
                        except="align, indent, color, background, image, link,list, code-block, clean"
                        class="rounded border-2 border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200"
                        error_message="Please enter island description" label="Description" />
                </div>
                <!-- Instruction for users -->
                <p class="text-center my-6 md:my-6 text-red-500">Click on the map to automatically set the longitude and
                    latitude.
                </p>
                <div id="map" class="z-10"></div>
            </form>
        </div>
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

            document.querySelector('input[name="longitude"]').value = lng;
            document.querySelector('input[name="latitude"]').value = lat;

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

    <style>
       
    </style>
</section>
