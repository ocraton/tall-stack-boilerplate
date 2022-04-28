<x-jet-dialog-modal wire:model="isOpenDelete">
    <x-slot name="title">
        Cancella steccata
    </x-slot>
    <x-slot name="content">
        Cancellare la steccata del {{ Carbon\Carbon::parse($data)->format('d/m/Y') }}?
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('isOpenDelete', false)" wire:loading.attr="disabled">
            {{ __('Annulla') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-3" wire:click.prevent="delete({{ $steccata_id }})" wire:loading.attr="disabled">
            {{ __('Cancella Steccata') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
