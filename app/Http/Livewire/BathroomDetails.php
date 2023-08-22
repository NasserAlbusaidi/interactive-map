<?php

namespace App\Http\Livewire;

use App\Models\Amenity;
use App\Models\Review;
use App\Models\ReviewVotes;
use Livewire\Component;
use Str;

class BathroomDetails extends Component
{
    public $name;
    public $bathroomId;
    public $address;
    public $image;
    public $reviews;
    public $amenities;
    public $averageRating;
    public $amenityIcons = [];
    public $upvote;
    public $downvote;

    protected $listeners = ['showBathroomDetails' => 'updateDetails'];

    public function render()
    {

        return view('livewire.bathroom-details');
    }

    public function updateDetails($bathroom)
    {
        $this->name = $bathroom['name'];
        $this->address = $bathroom['address'];
        $this->image = $bathroom['image'] ?? null;
        $this->reviews = Review::where('bathroom_id', $bathroom['id'])->get();



        $this->amenityIcons = Amenity::all()->pluck('icon', 'name')->toArray();
        $this->amenities = collect($bathroom['amenities'])->map(function ($amenity) {
            $amenity['icon'] = strtolower($this->amenityIcons[$amenity['name']]) ?? 'fas fa-question';
            return $amenity;
        });
        $this->averageRating = $this->calculateAverageRating();
        $this->dispatchBrowserEvent('toggleSidebar');
        $this->emit('showBathroomDetails', $bathroom);
    }

    public function calculateAverageRating()
{
    $totalRating = 0;
    $count = count($this->reviews);
    foreach ($this->reviews as $review) {
        $totalRating += $review['rating']; // Assuming 'rating' is a field in your review
    }

    return $count > 0 ? $totalRating / $count : 0;
}
public function voteReview($reviewId, $vote)
{
    // Find the specific review
    $review = Review::find($reviewId);

    // Get the current user ID (replace this with the actual user ID)
    $userId = auth()->id();

    // Check if the user has already voted on this review
    $existingVote = $review->votes()->where('user_id', $userId)->first();

    if ($existingVote) {
        // User has already voted; update the existing vote
        $existingVote->update([
            'upvote' => $vote,
            'downvote' => !$vote,
        ]);
    } else {
        // User has not voted; create a new vote
        $review->votes()->create([
            'user_id' => $userId,
            'upvote' => $vote,
            'downvote' => !$vote,
        ]);
    }

    // Update the specific review's votes in the reviews collection
    $this->reviews->each(function ($item) use ($reviewId, $vote) {
        if ($item->id == $reviewId) {
            if ($vote) {
                $item->upvotes++;
                $item->downvotes = max(0, $item->downvotes - 1); // Decrease downvotes if it was previously downvoted
            } else {
                $item->downvotes++;
                $item->upvotes = max(0, $item->upvotes - 1); // Decrease upvotes if it was previously upvoted
            }
        }
    });

    // No need to emit an event; the component state is updated
}


public function getVotes($reviewId)
{
    $upvotes = ReviewVotes::where('review_id', $reviewId)->where('upvote', 1)->count();
    $downvotes = ReviewVotes::where('review_id', $reviewId)->where('downvote', 1)->count();

    return compact('upvotes', 'downvotes');
}

}
