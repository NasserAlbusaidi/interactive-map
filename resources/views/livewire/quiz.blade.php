<div class="bg-gray-100 min-h-screen p-5">
    <!-- Title & Progress Bar -->
    <div class="mb-5">
        <h1 class="text-3xl mb-3">Quiz</h1>
        <div class="relative pt-1">
            <!-- Category Selection & Start Exam Button -->
            <div class="mt-5 mb-5">

                <label for="category" class="block text-sm font-medium text-gray-600">Select Category:</label>
                <select id="category" wire:model="selectedCategory" class="mt-1 block w-full">
                    <option value="" >Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @if ($selectedCategory)

                <button wire:click="startExam" class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Start Exam
                </button>
            </div>

            @endif
            @if($errorMessage)
                    <div class="alert alert-danger">
                        {{ $errorMessage }}
                    </div>
            @elseif ($currentQuestion)
            <div class="flex mb-2 items-center justify-between">
                <div>
                    <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-teal-600 bg-teal-200">
                        Question {{ $index + 1 }}/{{ $totalQuestions }}
                    </span>
                </div>
                <div class="text-right">
                    <span class="text-xs font-semibold inline-block text-teal-600 bg-teal-600 p-1 rounded-full">
                        {{ round(($index + 1) / $totalQuestions * 100) }}%
                    </span>
                </div>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ ($index + 1) / $totalQuestions * 100 }}%"></div>
              </div>


    </div>
    <!-- Question -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-4">
        <h2 class="text-xl mb-4">{{ $currentQuestion->text }}</h2>
        @foreach($currentQuestion->answers as $answer)
            <label class="block my-2">
                <input type="radio" class="mr-2" wire:model="selectedAnswer" value="{{ $answer->id }}">
                {{ $answer->text }}
            </label>
        @endforeach
    </div>
    @endif

    <div class="flex justify-between">
        @if($index < $questions->count())
            <button wire:click="nextQuestion" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150">Submit & Next</button>
        @endif
    </div>
</div>
</div>
</div>
