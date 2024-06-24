<section>
    <x-bladewind::modal backdrop_can_close="false" name="add-island" ok_button_action="saveProfile()"
        ok_button_label="Update" close_after_action="false">

        <form method="post" action="" class="profile-form">
            @csrf
            <b class="mt-0">Edit Your Profile</b>
            <div class="grid grid-cols-2 gap-4 mt-6">
                <x-bladewind::input required="true" name="first_name" error_message="Please enter your first name"
                    label="First name" />

                <x-bladewind::input required="true" name="last_name" error_message="Please enter your last name"
                    label="Last name" />
            </div>
            <x-bladewind::input required="true" name="email" error_message="Please enter your email"
                label="Email address" />

            <x-bladewind::input numeric="true" name="mobile" label="Mobile" />

            <div id="map" class="z-50"></div>
        </form>

    </x-bladewind::modal>

</section>
