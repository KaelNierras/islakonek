<section>
    <x-bladewind::modal name="editContactModal" size="medium" backdrop_can_close="false" ok_button_action="updateProfile()"
        ok_button_label="Update">

        <form method="post" action="{{ route('contacts.update', $selectedContact->id ?? '') }}" class="edit-form">
            @csrf
            @method('PUT')
            <b class="mt-0">Edit Contact</b>
            <div class="grid grid-cols-2 gap-4 mt-6">
                <x-bladewind::input required="true" name="first_name" error_message="Please enter your first name"
                    label="First name" value="{{ $selectedContact->first_name ?? '' }}"
                    class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200" />

                <x-bladewind::input required="true" name="last_name" error_message="Please enter your last name"
                    label="Last name" value="{{ $selectedContact->last_name ?? '' }}"
                    class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>
            <x-bladewind::input required="true" name="age" error_message="Please enter your email"
                label="Age" value="{{ $selectedContact->age ?? '' }}"
                class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200" />
            <select name="complete_location"
                class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200 w-full mb-3">
                @foreach ($locations as $location)
                    <option
                        value="{{ $location['x'] . ',' . $location['y'] . ',' . $location['location'] }}">
                        {{ $location['location'] }}</option>
                @endforeach
            </select>

            <x-bladewind::input numeric="true" name="mobile" label="Mobile"
                value="{{ $selectedContact->mobile ?? '' }}"
                class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200" />
        </form>
    </x-bladewind::modal>

</section>
