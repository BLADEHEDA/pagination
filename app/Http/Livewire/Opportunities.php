<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\WithPagination;
use Livewire\Component;

class Opportunities extends Component
{
    use WithPagination;
    
    public $perPage = 10;
    public $options = [10,20, 50, 100, 250];
    public $searchString = '';
    public $sortType = 'asc';
    public $sortOptions = ['asc', 'desc'];

    protected $queryString = ['perPage'];

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function search() 
    {
        $this->render();
    }

    public function render()
    {
        $items = Item::where('name', 'LIKE', '%' . $this->searchString . '%')->orderBy('name', $this->sortType)->paginate($this->perPage);
        return view('livewire.opportunities', [
            'items' => $items
        ]);
    }
}
