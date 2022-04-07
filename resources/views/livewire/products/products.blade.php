<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        Laravel 9 Livewire CRUD {{ __('Prodotti') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-md sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1">
                Crea nuovo Prodotto
            </button>
            <input wire:model="search" id="search" type="text" class="float-right shadow border rounded
             py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" style="float: right;">

            @if($isOpen)
            @include('livewire.products.create')
            @endif
            @if($isOpenDelete)
            @include('livewire.products.delete-modal-component')
            @endif

            <table class="w-full text-sm text-left text-gray-900 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-4 py-2 w-20">ID</th>
                        <th class="px-4 py-2" sortable direction="asc">Name</th>
                        <th class="px-4 py-2">Detail</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2 w-60">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td class="border px-4 py-2">{{ $product->id }}</td>
                        <td class="border px-4 py-2">{{ $product->name }}</td>
                        <td class="border px-4 py-2">{{ $product->detail }}</td>
                        <td class="border px-4 py-2">{{ Carbon\Carbon::parse($product->created_at)->format('d/m/Y') }}</td>
                        <td class="border px-4 py-2 text-center">
                            <button wire:click="edit({{ $product->id }})" title="modifica" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button wire:click="openDeleteModal({{ $product->id }})" title="cancella" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="border px-4 py-2" colspan="5">
                            <div class="flex item-center justify-center">
                                <span class="py-8 text-xl">
                                    No Produtcs...
                                </span>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <br>
            {{ $products->links() }}
        </div>
    </div>
</div>
