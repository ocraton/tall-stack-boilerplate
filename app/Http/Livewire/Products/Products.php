<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $isOpen = 0;
    public $isOpenDelete = 0;
    public $search = '';
    public $product_id = null;
    public $name = '';
    public $detail = '';

    protected $rules = [
        'name' => 'required|min:3',
        'detail' => 'required',
    ];
    protected $messages = [
        'name.required' => 'Il campo nome è richiesto',
        'name.min' => 'Il campo nome deve avere almeno 3 caratteri',
        'detail.required' => 'Il campo detail è richiesto',
    ];

    public function render()
    {
        return view('livewire.products.products', [
            'products' => Product::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }


    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function openDeleteModal($productId)
    {
        $product = Product::findOrFail($productId);
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->detail = $product->detail;
        $this->isOpenDelete = true;
    }

    public function closeDeleteModal()
    {
        $this->isOpenDelete = false;
    }

    private function resetInputFields()
    {
        $this->search = '';
        $this->name = '';
        $this->detail = '';
        $this->product_id = '';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        Product::updateOrCreate(['id' => $this->product_id], [
            'name' => $this->name,
            'detail' => $this->detail
        ]);

        session()->flash(
            'message',
            $this->product_id ? 'Product Updated Successfully.' : 'Product Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->name = $product->name;
        $this->detail = $product->detail;

        $this->openModal();
    }


    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Product Deleted Successfully.');
        $this->closeDeleteModal();
    }


}
