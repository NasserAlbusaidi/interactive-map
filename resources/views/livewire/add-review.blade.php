<div>
    @if (auth()->check())
        <div class="p-4 border-t">
            <h4 class="text-md font-semibold">Add Review</h4>
            <form wire:submit.prevent="submitReview">
                <textarea wire:model="reviewText" class="w-full p-2 border rounded" placeholder="Your review..."></textarea>
                <div class="flex justify-between items-center mt-2">
                    <select wire:model="rating" class="w-32 p-1 border rounded">
                        <option value="">Rate...</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="5">5 Stars</option>
                    </select>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                        @if ($oldReview)
                            Update Review
                        @else
                        Submit
                        @endif
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
