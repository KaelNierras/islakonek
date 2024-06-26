<div>
    @include('pages.island.partials.create-island-modal')
    @include('pages.island.partials.edit-island-modal')
    @include('pages.island.partials.delete-island-modal')
    <div class="shadow-sm sm:rounded-lg h-full">
        <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
            <!-- Table Title and Subtitle -->
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Island Table
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    This table shows the list of islands.
                </p>
            </div>
            <!-- Add Button -->
            <x-bladewind::button onclick="showAddIslandModal()">
                Add Island
            </x-bladewind::button>
        </div>
        <div class="flex flex-col gap-4 m-3">
            <x-bladewind::table exclude_columns="id" searchable="true" search_placeholder="Search..." class="rounded">
                <x-slot name="header">
                    <th>Name</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Action</th>
                </x-slot>
                @foreach ($islands as $island)
                    <tr>
                        <td>{{ $island->name }}</td>
                        <td>{{ $island->latitude }}</td>
                        <td>{{ $island->longitude }}</td>
                        <td>
                            <div class="flex max-w-10 gap-5">
                                <x-bladewind::button class="mx-auto block p-0"
                                    @click="showEditIslandModal({{ $island->id }})" color="none">
                                    <x-bladewind::icon name="pencil-square" class="!h-6 !w-6 text-blue-500" />
                                </x-bladewind::button>
                                <x-bladewind::button class="mx-auto block p-0"
                                    onclick="showModal('delete_island', {{ $island->id }})" color="none">
                                    <x-bladewind::icon class="text-red-500" name="trash" />
                                </x-bladewind::button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-bladewind::table>
            <div class="mt-4">
                {{-- {{ $islands->links('livewire.custom-pagination') }} --}}
                {{ $islands->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            domEl('.delete_island').submit();
        }

        function showAddIslandModal() {
            showModal('add-island');
            invalidateMapSize();
        }

        function showEditIslandModal(islandId) {
            Livewire.dispatch('get-island', {
                id: islandId
            });
            // Introduce a slight delay before showing the modal
            setTimeout(function() {
                showModal('edit_island');
            }, 1000); // Adjust the delay as needed
            setTimeout(function() {
                invalidateMapSizeEdit();
            }, 1000); // Adjust the delay as needed
        }

        window.addEventListener('show-modal', function() {
            showAddIslandModal();
            alert('Island added successfully');
        });
    </script>

</div>
