<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {

        $questions = Question::with('category','correctAnswer')->get();
        $categories = Category::all();  // Make sure to fetch categories
        return view('questions.index', compact('questions', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('questions.create', compact('categories'));
    }

    // Store new question
    public function store(Request $request)
    {
        // dd($request->all());
        $question = Question::create($request->only(['text', 'category_id']));
        $correctAnswerIndex = $request->input('correct_answer') - 1;  // Convert to 0-based index
        $answersData = $request->input('answers');

        foreach ($answersData as $index => $answerText) {
            $answer = new Answer(['text' => $answerText]);
            $answer->question()->associate($question);
            $answer->save();

            if ($index === $correctAnswerIndex) {
                $question->correct_answer_id = $answer->id;
                $question->save();
            }
        }

        return redirect()->route('questions.index')->with('success', 'Question created successfully.');

    }

    // Show edit form
    public function edit($id)
{
    $question = Question::with('answers')->findOrFail($id);
    $categories = Category::all();
    return view('questions.edit', compact('question', 'categories'));
}


    // Update existing question
    public function update(Request $request, $id)
{
    // Validate request data
    $request->validate([
        'text' => 'required|string|max:255',
        'category_id' => 'required|integer|exists:categories,id',
        'answers' => 'required|array|size:3',
        'correct_answer' => 'required|integer|min:1|max:3'
    ]);

    // Find the question
    $question = Question::findOrFail($id);

    // Update the question
    $question->update($request->only(['text', 'category_id']));

    // Update answers
    $correctAnswerIndex = $request->input('correct_answer') - 1;
    $answersData = $request->input('answers');

    foreach ($question->answers as $index => $existingAnswer) {
        $existingAnswer->text = $answersData[$index];
        $existingAnswer->save();

        if ($index === $correctAnswerIndex) {
            $question->correct_answer_id = $existingAnswer->id;
            $question->save();
        }
    }

    return redirect()->route('questions.index')->with('success', 'Question updated successfully.');
}

}
