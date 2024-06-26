<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-3">
            {{ __('Contact') }}
            <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-blue-500 text-white text-sm p-2">
                {{ $contactsCount }}
            </span>
        </h2>
    </x-slot>
    @include('components.notifications')
    @include('pages.contact.partials.create-modal')
    <div class="py-5 md:py-12 content">
        <div class="max-w-7xl mx-auto h-full sm:px-6 lg:px-8">
            <div class=" shadow-sm sm:rounded-lg h-full">
                <div class="flex flex-col gap-4">
                    @livewire('contact-details')
                </div>
            </div>
        </div>
</x-app-layout>
