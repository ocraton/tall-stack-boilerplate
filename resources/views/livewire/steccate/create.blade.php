<x-jet-dialog-modal wire:model="isOpen" >
    <x-slot name="title">
        @if ($steccata_id == null)
        Crea nuovo
        @else
        Modifica
        @endif
    </x-slot>
    <x-slot name="content">
        <form>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">

                    <div class="mb-4">
                        <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Altezza:</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="altezza" wire:model="altezza" placeholder="Altezza"></input>
                        @error('altezza') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Litri:</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="litri" wire:model="litri" placeholder="Litri"></input>
                        @error('litri') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4 py-4">
                        <h3 class="font-semibold">Prodotto
                            @if ($productSel)
                            {{ json_decode($productSel)->name }}
                            @endif
                        </h3>
                        @error('productSel') <span class="text-red-500">{{ $message }}</span>@enderror
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="queryProduct" wire:model="queryProduct" placeholder="Prodotto..."></input>
                        @if (strlen($queryProduct) > 2)
                        <ul class="list-none mt-4 ">
                            @forelse ($productres as $product)
                            <li class="border py-2 px-2 bg-gray-100">
                                <p>
                                    {{ $product->name }}
                                    <button class="p-1 inline-flex float-right items-center bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:click.prevent="setProductSel('{{$product}}')">
                                        seleziona
                                    </button>
                                </p>
                            </li>
                            @empty
                            <li>no results...</li>
                            @endforelse
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
    </x-slot>
    <x-slot name="footer">

        <x-jet-secondary-button wire:click="$set('isOpen', false)" wire:loading.attr="disabled">
            {{ __('Annulla') }}
        </x-jet-secondary-button>

        <x-jet-button wire:click.prevent="store()" wire:loading.attr="disabled" class="ml-3 bg-green-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green">
            {{ __('Salva') }}
        </x-jet-button>
        </form>
    </x-slot>
</x-jet-dialog-modal>
