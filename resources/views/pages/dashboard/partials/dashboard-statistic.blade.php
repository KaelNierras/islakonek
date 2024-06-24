<section>
    <div class="flex flex-col sm:flex-row justify-start gap-5 sm:gap-6 mb-5">
        <x-bladewind::statistic icon_position="right" number="{{ $totalUsers }}" label="Total users">
            <x-slot name="icon">
                <svg class="h-16 w-16 p-3 text-white rounded-full bg-blue-500">
                    <x-bladewind::icon name="user" class="h-16 w-16 text-white" />
                </svg>
            </x-slot>
        </x-bladewind::statistic>
        <x-bladewind::statistic icon_position="right" number="{{ $totalContacts }}" label="Total contact">
            <x-slot name="icon">
                <svg class="h-16 w-16 p-3 text-white rounded-full bg-orange-500">
                    <x-bladewind::icon name="phone" class="h-16 w-16 text-white" />
                </svg>
            </x-slot>
        </x-bladewind::statistic>
        <x-bladewind::statistic icon_position="right" number="3" label="Total Island">
            <x-slot name="icon">
                <svg class="h-16 w-16 p-3 text-white rounded-full bg-green-500">
                    <x-bladewind::icon name="chart-bar" class="h-16 w-16 text-white" />
                </svg>
            </x-slot>
        </x-bladewind::statistic>
    </div>
</section>