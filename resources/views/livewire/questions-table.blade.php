<div>

        <div class="flex justify-between my-4 px-2">
            <a href="{{ route('questions.create') }}" class="bg-green-500 border border-green-500 text-white rounded px-3 py-2">Add New Question</a>
            <div>
                <label for="sortOrder" class="text-gray-600">Sort By:</label>
                <select id="sortOrder" wire:change="updateSortOrder($event.target.value)" class="border rounded text-gray-600">
                   <option value="All">All</option>
                   @foreach ($categories as $category)
                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                   @endforeach
                </select>
            </div>
        </div>
        <div class="rounded-lg overflow-hidden">
            <div class="bg-blue-900 text-white p-4">
                Questions List
            </div>
            <div class="p-4">
                <div class="grid grid-cols-5 gap-4 text-center text-lg font-medium">
                    <div>ID</div>
                    <div>Text</div>
                    <div>Category</div>
                    <div>Correct Answer</div>
                    <div>Actions</div>
                </div>
                @foreach ($questions as $question)
                <div class="grid grid-cols-5 gap-4 text-center border-b border-gray-200 py-4">
                    <div class="text-gray-700">{{ $question->id }}</div>
                    <div class="text-blue-700">{{ $question->text }}</div>
                    <div class="text-green-700">{{ $question->category->name ?? 'N/A' }}</div>
                    <div class="text-red-700">{{ $question->correctAnswer->text ?? 'N/A' }}</div>
                    <div>
                        <a href="{{ route('questions.edit', $question->id) }}" class="bg-yellow-500 text-white rounded-lg px-2 py-1">Edit</a>
                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white rounded-lg px-2 py-1">Delete</button>

                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</div>
