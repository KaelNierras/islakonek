<section>
    <div class="flex flex-row gap-3 items-center justify-between">
        <div class="flex flex-row gap-3 items-center">
            @if ($selectedContact)
                <x-bladewind::icon name="user-circle" class="h-12 w-12 text-blue-500" />
            @endif
            <div class="flex-col">
                <h4 class="font-semibold">
                    {{ ($selectedContact->first_name ?? '') . ' ' . ($selectedContact->last_name ?? '') }}
                </h4>
                <p>{{ $selectedContact->location ?? '' }}</p>
            </div>
        </div>
        @if ($selectedContact)
            <div class="flex flex-row">
                <x-bladewind::button onclick="showModal('editContactModal')" color="none"
                    class="p-2"><x-bladewind::icon class="text-blue-500 p-0"
                        name="pencil-square" /></x-bladewind::button>

                <form method="post" action="{{ route('contacts.destroy', $selectedContact->id) }}">
                    @csrf
                    @method('delete')
                    <x-bladewind::button can_submit="true" class="p-2" color="none">
                        <x-bladewind::icon class="text-red-500 p-0" name="trash" />
                    </x-bladewind::button>
                </form>

            </div>
        @endif
    </div>
    <div class="mb-4 flex flex-row pt-10 justify-start gap-10">
        @if($selectedContact)
        <div>
            <h1 class="text-gray-400">Age</h1>
            <p>
                @isset($selectedContact->age)
                    {{ $selectedContact->age }} yrs. old
                @endisset
            </p>
        </div>
        <div>
            <h1 class=" text-gray-400">Phone</h1>
            <p>{{ $selectedContact->mobile ?? '' }}</p>
        </div>
        @endif
    </div>
    <hr class="my-4">
    <div id="map" class="z-10"></div>

</section>
