<?php

namespace App\Http\Livewire\Steccate;

use Livewire\Component;
use App\Models\Steccata;
use App\Models\Product;
use Illuminate\Support\Carbon;

class Steccate extends Component
{
    public $isOpen = false;
    public $isOpenDelete = false;
    public $search = '';
    public $steccata_id = null;
    public $altezza = 0.0;
    public $litri = 0.0;
    public $queryProduct = '';
    public $productres;
    public $productSel;
    public $data;


    protected $listeners = ['setDatePicker' => 'setDate'];

    protected $rules = [
        'altezza' => 'required|numeric',
        'litri' => 'required',
        'productSel' => 'required',
    ];
    protected $messages = [
        'altezza.required' => 'Il campo altezza è richiesto',
        'altezza.numeric' => 'Il campo altezza è numerico',
        'litri.required' => 'Il campo litri è richiesto',
        'productSel.required' => 'Il campo Prodotto è richiesto',
    ];

    public function render()
    {
        if(strlen($this->queryProduct) > 2){
            $this->productres = Product::where('name', 'like', '%' . $this->queryProduct . '%')->limit(20)->get();
        }
        return view('livewire.steccate.steccate', [
            'steccate' => Steccata::where('data', 'like', '%' . $this->search . '%')->with('product')
                ->orderBy('data', 'desc')->paginate(10),
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->data = Carbon::now()->format('Y-m-d');
        $this->isOpen = true;
    }

    public function edit($id)
    {
        $steccata = Steccata::findOrFail($id);
        $this->steccata_id = $id;
        $this->altezza = $steccata->altezza;
        $this->litri = $steccata->litri;
        $this->data = $steccata->data;
        $this->productSel = $steccata->product;
        $this->isOpen = true;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function openDeleteModal($steccataId)
    {
        $steccata = Steccata::findOrFail($steccataId);
        $this->steccata_id = $steccata->id;
        $this->data = $steccata->data;
        $this->isOpenDelete = true;
    }

    public function store()
    {
        $this->validate();

        Steccata::updateOrCreate(['id' => $this->steccata_id], [
            'altezza' => $this->altezza,
            'litri' => $this->litri,
            'data' => Carbon::createFromFormat('Y-m-d', $this->data),
            'product_id' => intval(json_decode($this->productSel)->id)
        ]);

        session()->flash(
            'message',
            $this->steccata_id ? 'Steccata Updated Successfully.' : 'Steccata Created Successfully.'
        );

        $this->isOpen = false;
        $this->resetInputFields();
    }

    public function setProductSel($product){
        $this->queryProduct = '';
        $this->productSel = $product;
    }

    public function setDate($date){
        $this->data = $date;
    }

    private function resetInputFields()
    {
        $this->queryProduct = '';
        $this->altezza = '';
        $this->litri = '';
    }

    public function delete($id)
    {
        Steccata::find($id)->delete();
        session()->flash('message', 'Steccata Deleted Successfully.');
        $this->isOpenDelete = false;
    }
}
