<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Review;

class AddReview extends Component
{
    public $reviewText;
    public $rating;
    public $bathroomId;
    public $oldReview;
    protected $listeners = ['showBathroomDetails' => 'mount'];

    public function mount($bathroomId)
    {
        $this->bathroomId = $bathroomId;

    }
    public function submitReview()
    {
        $this->validate([
            'reviewText' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        //check if user has already submitted a review
        $this->oldReview = Review::where('user_id', auth()->id())->where('bathroom_id', $this->bathroomId['id'])->first();
        if ($this->oldReview) {
            $this->oldReview->update([
                'text' => $this->reviewText,
                'rating' => $this->rating,
            ]);
            $this->emit('reviewAdded'); // You can listen for this event to refresh the reviews
            return;
        }

        Review::create([
            'user_id' => auth()->id(),
            'bathroom_id' => $this->bathroomId['id'],
            'text' => $this->reviewText,
            'rating' => $this->rating,
            'author' => auth()->user()->name,
            'date' => now(),
        ]);

        $this->emit('reviewAdded'); // You can listen for this event to refresh the reviews
    }

    public function render()
    {
        return view('livewire.add-review');
    }
}
