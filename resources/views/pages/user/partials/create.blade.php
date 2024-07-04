<x-bladewind::modal backdrop_can_close="false" name="add-user" ok_button_action="saveUser()" size='large'
    ok_button_label="Add User" close_after_action="false">
    <form method="POST" enctype="multipart/form-data" action="{{ route('user.store') }}" class="user-form">
        @csrf

        <h5 class="mt-0 mb-6 text-lg">Add User</h5>
        <!-- Name -->
        <div class="flex flex-row gap-5">
            <div class="flex-grow">
                <!-- Changed from flex-3 to flex-grow for the left side to take up available space -->
                <div>
                    <x-bladewind::input required="true" name="name"
                        class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200"
                        error_message="Please enter your last name" label="Name" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-bladewind::input required="true" name="email"
                        class="rounded border-2 border-gray-200  focus:outline-none focus:ring-2 focus:ring-gray-200"
                        error_message="Please enter your email address" label="Email" />
                </div>

                <!-- Role Selection -->
                <div class="mt-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" name="role" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="">Select Role</option>
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                <!-- Status -->
                <div class="mt-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="">Select Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-bladewind::input required="true" type="password" name="password"
                        class="rounded border-2 border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200"
                        error_message="Please enter your password" label="Password" />
                </div>

                <div class="mt-4">
                    <x-bladewind::input required="true" type="password" name="password_confirmation"
                        class="rounded border-2 border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200"
                        error_message="Please confirm your password" label="Password Confirmation" />
                </div>
            </div>

            <!-- Avatar Upload with Preview -->
            <div class="flex-none w-1/4">
                <label for="avatar" class="block text-sm font-medium text-gray-700">Avatar</label>
                <div class="mt-1 flex items-center flex-col">

                    <span class="inline-block h-full w-full rounded-full overflow-hidden bg-gray-100">
                        <img id="avatarPreview" src="#" alt="Avatar preview" class="h-full w-full text-gray-300"
                            style="display: none;">
                    </span>
                    <button type="button" onclick="document.getElementById('avatar').click();"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Upload
                    </button>
                    <!-- Remove Avatar Clickable Text -->
                    <a href="javascript:void(0);" onclick="removeAvatar();"
                        class="mt-2 text-gray-500 hover:text-red-700 cursor-pointer">
                        Remove Avatar
                    </a>
                </div>
                <input id="avatar" name="avatar" type="file" class="hidden" onchange="previewAvatar()"
                    accept="image/*">

            </div>

        </div>
    </form>

    <script>
        saveUser = () => {
            const password = document.querySelector('input[name="password"]').value;
            const confirmPassword = document.querySelector('input[name="password_confirmation"]').value;
            if (password !== confirmPassword) {
                // Improved error message for clarity and user guidance
                showNotification('Password Mismatch', 'The passwords you entered do not match. Please try again.',
                    'error');
                return false;
            }

            if (validateForm('.user-form')) {
                domEl('.user-form').submit();
            } else {
                // Added a general form validation error message for better user feedback
                showNotification('Form Error', 'Please check your input and try again.', 'error');
                return false;
            }
        }

        function previewAvatar() {
            const [file] = document.getElementById('avatar').files;
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    document.getElementById('avatarPreview').src = e.target.result;
                    document.getElementById('avatarPreview').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }

        function removeAvatar() {
            // Hide the avatar preview and optionally revert to a default image
            document.getElementById('avatarPreview').style.display = 'none';
            document.getElementById('avatarPreview').src = '#'; // Set to default or no avatar image path
            document.getElementById('avatar').value = ''; // Clear the file input
        }
    </script>

</x-bladewind::modal>
