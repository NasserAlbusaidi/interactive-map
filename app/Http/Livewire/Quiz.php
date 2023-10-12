<?php

namespace App\Http\Livewire;

use App\Models\Score;
use Livewire\Component;
use App\Models\Question;
use App\Models\Category;

class Quiz extends Component
{
    public $currentQuestion;
    public $selectedAnswer;
    public $feedback;
    public $questions;
    public $index = 0;
    public $score = 0;
    public $totalQuestions;
    public $currentQuestionNumber;
    public $selectedCategory;  // New Property for selected category
    public $categories;  // New Property for available categories
    public $errorMessage = null;  // New Property for error message
    public $taken = [];
    public function mount()
    {
        $this->questions = collect([]);
        $this->totalQuestions = 0;
        $userscore = Score::where('user_id', auth()->id())->get();
        // dd($userscore);
        foreach ($userscore as $score) {
            array_push($this->taken, $score->category_id);
        }
        // dd($this->taken);
        $this->categories = Category::whereNotIn('id', $this->taken)->get(); // Fetch all categories
        // dd($this->categories);

        // check if the user has already taken the quiz


    }

    public function render()
    {
        return view('livewire.quiz');
    }

    public function startExam()
    {
        if (!$this->selectedCategory) {
            session()->flash('error', 'Please select a category.');
            return;
        }

        $this->taken = Score::where('user_id', auth()->id())->where('category_id', $this->selectedCategory)->first();

        if ($this->taken) {
           $this->errorMessage = 'You have already taken this quiz';
            return;
        }

        //get the first 10 questions
        $this->questions = Question::where('category_id', $this->selectedCategory)->with(['answers', 'correctAnswer'])->inRandomOrder()->take(10)->get();
        $this->totalQuestions = $this->questions->count();

        if ($this->totalQuestions > 0) {
            $this->currentQuestion = $this->questions[$this->index];
        } else {
            session()->flash('error', 'No questions found for this category.');
        }
    }

    public function nextQuestion()
    {
        // Record the user's answer for the current question
        // You'll likely want to store this in the database or some local state
        // This is a placeholder; your answer recording logic will go here
        if ($this->selectedAnswer == $this->currentQuestion->correctAnswer->id) {
            //increment the score based on total questions to sum up the score to 10
            $this->score += 10 / $this->totalQuestions;
        }


        $this->index++;

        if ($this->index < $this->totalQuestions) {
            $this->currentQuestion = $this->questions[$this->index];
        } else {
            $this->finishExam();
        }
    }

    public function finishExam()
    {
        // Calculate and store the score
        // This is a placeholder; your scoring logic will go here


        Score::create([
            'user_id' => auth()->id(),
            'score' => $this->score,
            'category_id' => $this->selectedCategory,
        ]);

        // refreesh the page
        return redirect()->route('logistic-calculator');
    }
}
