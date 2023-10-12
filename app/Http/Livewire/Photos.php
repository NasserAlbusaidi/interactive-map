<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;

class Photos extends Component
{
    use WithFileUploads;

    public $bathroomId;
    public $images;
    public $image;
    public $showModal = false;

    protected $listeners = ['showBathroomDetails' => 'updateDetails'];
    public function mount($bathroomId)
    {
        // Get details for bathroom
        $this->bathroomId = $bathroomId;
        $this->images = Image::where('bathroom_id', $bathroomId)->get();
        $this->showModal = true;
    }

    public function updateDetails($bathroomId)
    {
        // Get details for bathroom
        $this->bathroomId = $bathroomId;
        $this->images = Image::where('bathroom_id', $bathroomId)->get();
        $this->showModal = true;
    }
    public function openModal()
    {
        $this->showModal = true;

    }

    public function closeModal()
    {
        $this->showModal = false;
    }


    public function render()
    {
        return view('livewire.photos');
    }
}
