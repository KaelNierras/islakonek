<section>
    <div class="mb-4">
        <div class="flex flex-row gap-3">
            <x-bladewind::input placeholder="Search..." clearable="true" wire:model.live="search"
                class="rounded-lg border-gray-300 h-10" />

            <select name="complete_location" wire:model.live="search"
                class="border-2 border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200 w-1/2 mb-3 p-2 h-10 rounded-lg">
                @foreach ($locations as $location)
                    <option value="{{ $location['location'] }}">
                        {{ $location['location'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="scrollable-container">
        <ul class="space-y-3 pr-5">
            @forelse ($contacts as $contact)
                <li wire:click="showContact({{ $contact->id }})"    
                    class="group rounded-tl-xl rounded-bl-xl flex p-1 items-center space-x-2 hover:bg-gray-100 transition-colors duration-200 hover:border-r-2 hover:border-gray-500 cursor-pointer relative {{ $selectedContact->id == $contact->id ? 'bg-gray-200 border-r-2 border-gray-500' : '' }}">
                    <x-bladewind::icon name="user-circle" class="h-12 w-12 text-blue-500" />
                    <div class="flex flex-row items-center justify-between w-full">
                        <div>{{ $contact->first_name . ' ' . $contact->last_name }}</div> <!-- Name -->
                        <div class="text-sm text-gray-500">{{ $contact->location }}</div> <!-- Address -->
                    </div>
                </li>
            @empty
                <x-bladewind::empty-state show_image="false">
                    <div class="flex flex-col justify-center w-full">
                        <div class="flex justify-center">
                            @include('components.icon-phone');
                        </div>

                        <p class="pt-2">You have no contact data available</p>
                    </div>

                </x-bladewind::empty-state>
            @endforelse
        </ul>
    </div>

    

</section>
