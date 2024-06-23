<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-5 md:py-12 content">
        <div class="max-w-7xl mx-auto h-full sm:px-6 lg:px-8">
            <div class=" shadow-sm sm:rounded-lg h-full">
                <div class="flex flex-col gap-4">
                    <x-bladewind::table :data="$users"
                    exclude_columns="id, email_verified_at" 
                    />
                </div>
            </div>
        </div>
</x-app-layout>
