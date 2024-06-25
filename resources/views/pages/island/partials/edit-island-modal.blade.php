<section>
    <x-bladewind::modal backdrop_can_close="false" name="edit_island" size="xl" ok_button_action="saveIsland()"
        ok_button_label="Edit" close_after_action="false">

        <form method="post" action="{{ route('island.store') }}" class="edit-island-form">
            @csrf
            <h2 class="mt-0 text-3xl">Edit Island</h2>
            <!-- Instruction for users to manually input island name -->
            <p class="text-start text-red-500 mt-4">Please manually input the island name below.</p>
            <div class="grid grid-cols-2 gap-4">
                <x-bladewind::input required="true" name="name" error_message="Please enter island name"
                    class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200"
                    label="Island name"
                    selected_value="{{ $editIsland->name }}" />
            </div>

            <div class="grid grid-cols-2 gap-4 mt-0">
                <x-bladewind::input required="true" name="longitude_edit"
                    class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200"
                    error_message="Please enter your longitude coordinates" label="Longitude" 
                    selected_value="{{ $editIsland->longitude }}"
                    />

                <x-bladewind::input required="true" name="latitude_edit"
                    class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200"
                    error_message="Please enter your latitude coordinates" label="Latitude"
                    selected_value="{{ $editIsland->latitude }}"
                    />
            </div>
            <!-- Instruction for users -->
            <p class="text-center mt-4 text-red-500">Click on the map to automatically set the longitude and latitude.
            </p>
            <div id="mapEdit" class="z-10"></div>
            <button type="button" onclick="invalidateMapSizeEdit()" class="mt-4">Adjust Map Display</button>
        </form>
    </x-bladewind::modal>

    <script>
        function edittIsland() {
            if (validateForm('.edit-island-form')) {
                domEl('.edit-island-form').submit();
            } else {
                return false;
            }
        }

        // Initialize the map in edit mode
        var mapEdit = L.map('mapEdit').setView([10.210334, 484.017448], 14);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(mapEdit);

        // Invalidate size after the map is initialized
        mapEdit.invalidateSize();

        var popupEdit = L.popup();

        function onMapClickEdit(e) {
            var lat = parseFloat(e.latlng.lat.toFixed(6));
            var lng = parseFloat(e.latlng.lng.toFixed(6));

            document.querySelector('input[name="longitude_edit"]').value = lng; 
            document.querySelector('input[name="latitude_edit"]').value = lat; 

            popupEdit
                .setLatLng(e.latlng)
                .setContent("Coordinates set to: " + e.latlng.toString())
                .openOn(mapEdit);
        }

        mapEdit.on('click', onMapClickEdit);

        function invalidateMapSizeEdit() {
            mapEdit.invalidateSize();
        }

        // Call invalidateMapSizeEdit to ensure map size is correct after initialization
        invalidateMapSizeEdit();
    </script>


</section>
