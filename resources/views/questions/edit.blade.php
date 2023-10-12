@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl mb-4">Edit Question</h1>
    <form action="{{ route('questions.update', $question->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="text" class="block text-sm font-medium text-gray-600">Question Text</label>
            <input type="text" name="text" id="text" value="{{ $question->text }}" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-600">Category</label>
            <select name="category_id" id="category_id" class="mt-1 p-2 w-full border rounded-md">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $question->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <fieldset class="mb-4">
            <legend class="text-sm font-medium text-gray-600">Answers</legend>
            @foreach($question->answers as $index => $answer)
                <div class="mt-2">
                    <label for="answer{{ $index+1 }}" class="mr-2">Answer {{ $index+1 }}:</label>
                    <input type="text" name="answers[]" id="answer{{ $index+1 }}" value="{{ $answer->text }}" class="p-2 border rounded-md">
                    <input type="radio" name="correct_answer" value="{{ $index+1 }}" {{ $answer->id == $question->correct_answer_id ? 'checked' : '' }} class="ml-4">
                    <span class="text-sm text-gray-600">Correct Answer</span>
                </div>
            @endforeach
        </fieldset>

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Question</button>
        </div>
    </form>
</div>
@endsection
