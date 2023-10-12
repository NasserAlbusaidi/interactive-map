<div>
    <h1 class="text-3xl mb-3">Leaderboard</h1>

    <!-- Category Selection -->
    <label for="category">Select Category:</label>
    <select id="category" wire:model="selectedCategory" wire:change="loadScores">
        <option value="All">All</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <!-- Leaderboard Table -->
    <table class="min-w-full bg-white mt-4 border border-gray-300 rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-700 text-white uppercase text-sm leading-normal">
                <th class="py-2 px-4 border border-gray-300">Rank</th>
                <th class="py-2 px-4 border border-gray-300">User</th>
                <th class="py-2 px-4 border border-gray-300">Category</th>
                <th class="py-2 px-4 border border-gray-300">Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topScores as $index => $score)
                <tr class="text-gray-700 text-sm leading-normal text-center">
                    <td class="py-2 px-4 border border-gray-300">{{ $index + 1 }}</td>
                    <td class="py-2 px-4 border border-gray-300">{{ $score->user->name ?? 'Unknown' }}</td>  <!-- Assuming 'name' is a column on your User model -->
                    <td class="py-2 px-4 border border-gray-300">{{ $score->category->name }}</td>
                    <td class="py-2 px-4 border border-gray-300">{{ $score->score }}/10</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
