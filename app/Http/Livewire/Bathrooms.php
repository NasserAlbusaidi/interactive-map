<?php

namespace App\Http\Livewire;

use App\Models\Bathroom;
use Livewire\Component;

class Bathrooms extends Component
{

    public $bathrooms;

    public function mount()
    {
        $this->bathrooms = Bathroom::with('amenities', 'reviews', 'images')->get();
    }
    public function render()
    {
        return view('livewire.bathrooms');
    }

    public function markerClicked($bathroomId)
    {
        $bathroom = $this->bathrooms->firstWhere('id', $bathroomId);
        $this->emit('showBathroomDetails', $bathroom->id); // Emitting bathroom ID
    }
}
