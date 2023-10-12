<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Score;
use App\Models\Category;
use App\Models\Question;

class Leaderboard extends Component
{
    public $topScores;
    public $selectedCategory;
    public $categories;
    public $totalquestions;

    public function mount()
    {
        $this->categories = Category::all(); // Fetch all categories
        $this->loadScores();
    }

    public function loadScores()
    {
        // Fetch top 10 scores based on selected category
        $query = Score::with('user');

        if ($this->selectedCategory === "All") {
            // If "All" is selected, show all scores with total questions
            $query->whereNotNull('category_id');
        } elseif ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        $this->totalquestions = Question::where('category_id', $this->selectedCategory)->count();

        $this->topScores = $query->orderByDesc('score')->take(10)->get();
    }

    public function render()
    {

        return view('livewire.leaderboard');
    }
}
