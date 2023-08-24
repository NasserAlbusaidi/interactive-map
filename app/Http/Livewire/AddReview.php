<?php

namespace App\Http\Livewire;

use App\Models\Amenity;
use App\Models\Bathroom;
use Livewire\Component;
use App\Models\Review;

class AddReview extends Component
{
    public $reviewText;
    public $rating;
    public $bathroomId;
    public $oldReview;

    public $amenities;
    public $amenityRatings = [];

    protected $listeners = ['showBathroomDetails' => 'updateBathroomId'];

    public function updateBathroomId($bathroomId)
    {
        $this->bathroomId = $bathroomId;
        $bathroom = Bathroom::with('amenities')->find($bathroomId);

        // Pluck the name and icon of the amenities
        $this->amenities = $bathroom->amenities->pluck('name', 'icon');
        foreach ($this->amenities as $icon => $name) {
            $this->amenityRatings[$name] = 0; // Default rating value
        }

    }
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function submitReview()
    {
        // Validate the inputs as usual
        $this->validate([
            'reviewText' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Check if the user has already submitted a review for this bathroom
        $existingReview = Review::where('user_id', auth()->id())
            ->where('bathroom_id', $this->bathroomId)
            ->first();

        if ($existingReview) {
            // If a review exists, you can either update it or simply return a message.
            // Here's how you might update it:
            $existingReview->update([
                'text' => $this->reviewText,
                'rating' => $this->rating,
            ]);
            session()->flash('message', 'Your review has been updated.');
        } else {
            // Create a new review if no existing review was found
            Review::create([
                'user_id' => auth()->id(),
                'bathroom_id' => $this->bathroomId,
                'text' => $this->reviewText,
                'rating' => $this->rating,
                'author' => auth()->user()->name,
                'date' => now(),
            ]);
            session()->flash('message', 'Your review has been submitted.');
        }

        $this->emit('reviewAdded'); // You can listen for this event to refresh the reviews
    }

    public function setAmenityRating($amenityName, $rating)
{
    $this->amenityRatings[$amenityName] = $rating;
}
    public function render()
    {
        return view('livewire.add-review');
    }
}
