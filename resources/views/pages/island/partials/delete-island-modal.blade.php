<section>
    <x-bladewind::modal backdrop_can_close="true" name="delete_island" ok_button_action="confirmDelete()"
        ok_button_label="Delete" size="big" close_after_action="false" type="warning" title="Confirm User Deletion">

        @if($editIsland)
            <form method="post" action="{{ route('island.destroy', $editIsland->id) }}" class="delete-form">
                @csrf
                @method('delete')
                Are you sure you want to delete this island? This action cannot be undone.
            </form>
        @endif

    </x-bladewind::modal>
</section>