<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;
use App\Models\Category;

class QuestionsTable extends Component
{
    public $questions;
    public $categories;
    public $selectedCategory = 'All';

    public function mount()
    {
        $this->categories = Category::all(); // Fetch all categories
        $this->updateSortOrder();
    }

    public function render()
    {
        return view('livewire.questions-table');
    }

    public function updateSortOrder($selectedCategory = null)
    {
        if ($selectedCategory) {
            $this->selectedCategory = $selectedCategory;
        }

        $query = Question::with('category');

        if ($this->selectedCategory === "All") {
            // If "All" is selected, show all questions
            $query->whereNotNull('category_id');
        } elseif ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        $this->questions = $query->get();
    }
}
