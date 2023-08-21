<?php

namespace App\Http\Livewire;

use App\Models\Amenity;
use Livewire\Component;
use Str;

class BathroomDetails extends Component
{
    public $name;
    public $address;
    public $image;
    public $reviews;
    public $amenities;
    public $averageRating;
    public $amenityIcons = [];

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
        $this->reviews = $bathroom['reviews'];
        $this->amenityIcons = Amenity::all()->pluck('icon', 'name')->toArray();
        $this->amenities = collect($bathroom['amenities'])->map(function ($amenity) {
            $amenity['icon'] = strtolower($this->amenityIcons[$amenity['name']]) ?? 'fas fa-question';
            return $amenity;
        });
        // dd($this->amenities[0]['name']); // This is where I get the error: "Undefined offset: 0" [C:\xampp\htdocs\laravel\app\Http\Livewire\BathroomDetails.php:50
        $this->averageRating = $this->calculateAverageRating();
        $this->dispatchBrowserEvent('toggleSidebar');
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
}
