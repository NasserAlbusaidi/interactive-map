<?php
namespace App\Http\Livewire;

use Livewire\Component;

class SearchBar extends Component
{
    public $query = '';
    public $results = [];

    public function updatedQuery()
    {
        $this->results = \DB::table('bathrooms')
            ->where('name', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
