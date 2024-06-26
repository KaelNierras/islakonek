<section>
    <x-bladewind::modal backdrop_can_close="false" name="form-mode" ok_button_action="saveProfile()" ok_button_label="Add"
        close_after_action="false">

        <form method="post" action="{{ route('contacts.store') }}" class="profile-form">
            @csrf
            <h5 class="mt-0 text-lg">Add Contact</h5>
            <div class="grid grid-cols-2 gap-4 mt-6">
                <x-bladewind::input required="true" name="first_name" error_message="Please enter your first name"
                    label="First name"
                    class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200" />

                <x-bladewind::input required="true" name="last_name" error_message="Please enter your last name"
                    label="Last name"
                    class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>
            <x-bladewind::input required="true" name="age" error_message="Please enter your age"
                label="Age"
                class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200" />
            <select name="complete_location"
                class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200 w-full mb-3">
                @foreach ($locations as $location)
                    <option
                        value="{{ $location->longitude . ',' . $location->latitude . ',' . $location->name . ',' . $location->id }}">
                        {{ $location->name }}</option>
                @endforeach
            </select>

            <x-bladewind::input numeric="true" name="mobile" label="Mobile"
                class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200" />
        </form>

    </x-bladewind::modal>

</section>
