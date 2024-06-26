<div>
    @include('pages.contact.partials.edit-modal')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        <div class="drop-shadow p-5 bg-white rounded-xl col-span-2 flex flex-col">
            <div class="flex-grow">
                <!-- Sidebar content here -->
                @include('pages.contact.partials.sidebar')
            </div>
            <x-bladewind::button show_close_icon="true" onclick="showModal('form-mode')">
                Add Contacts
            </x-bladewind::button>
        </div>
        <div class="p-5 mx-5 col-span-3 bg-white rounded-xl">
            <div>
                <!-- Main content here -->
                @include('pages.contact.partials.main-content')
            </div>
        </div>
    </div>
    @if (!is_null($selectedContact) && $selectedContact->longitude && $selectedContact->latitude)
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var map = L.map('map').setView([{{ $selectedContact->latitude }}, {{ $selectedContact->longitude }}],
                    16);
                map.invalidateSize();
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                // L.marker([{{ $selectedContact->longitude }}, {{ $selectedContact->latitude }}]).addTo(map);

            });
        </script>
    @endif

    <script>
        function saveProfile() {
            if (validateForm('.profile-form')) {
                domEl('.profile-form').submit();
            } else {
                return false;
            }
        }

        function updateProfile() {
            if (validateForm('.edit-form')) {
                domEl('.edit-form').submit();
            } else {
                return false;
            }
        }

        function confirmDelete () {
            domEl('.delete-form').submit();
        }
        
    </script>
</div>
