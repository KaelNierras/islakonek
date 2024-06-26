<section>
    <x-bladewind::modal backdrop_can_close="true" name="delete_confirm" ok_button_action="confirmDelete()"
        ok_button_label="Delete" size="big" close_after_action="false" type="warning" title="Confirm Contact Deletion">

        @if($selectedContact)
            <form method="post" action="{{ route('contacts.destroy', $selectedContact->id) }}" class="delete-form">
                @csrf
                @method('delete')
                Are you sure you want to delete this contact? This action cannot be undone.
            </form>
        @endif

    </x-bladewind::modal>
</section>