<div>
    @if (auth()->check())
        <div class="p-4 border-t">
            <h4 class="text-md font-semibold">Add Review</h4>
            <div class="flex items-center space-x-2 mb-2">
                <button wire:click="setRating(1)" class="{{ $rating >= 1 ? 'text-yellow-400' : 'text-gray-300' }}">
                    <i class="fas fa-star"></i>
                </button>
                <button wire:click="setRating(2)" class="{{ $rating >= 2 ? 'text-yellow-400' : 'text-gray-300' }}">
                    <i class="fas fa-star"></i>
                </button>
                <button wire:click="setRating(3)" class="{{ $rating >= 3 ? 'text-yellow-400' : 'text-gray-300' }}">
                    <i class="fas fa-star"></i>
                </button>
                <button wire:click="setRating(4)" class="{{ $rating >= 4 ? 'text-yellow-400' : 'text-gray-300' }}">
                    <i class="fas fa-star"></i>
                </button>
                <button wire:click="setRating(5)" class="{{ $rating >= 5 ? 'text-yellow-400' : 'text-gray-300' }}">
                    <i class="fas fa-star"></i>
                </button>
            </div>
            <form wire:submit.prevent="submitReview">
                <textarea wire:model="reviewText" class="w-full p-2 border rounded" placeholder="Your review..."></textarea>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">
                    Submit
                </button>
            </form>
        </div>
        <button onclick="openAmenityRatingModal()">Rate Amenities</button>

        <!-- Modal HTML -->
        @if ($amenities)
            <div id="amenityRatingModal"
                class="fixed inset-0 hidden z-50 flex justify-center items-center bg-black bg-opacity-50">
                <div class="bg-white p-8 rounded-lg">
                    <h3 class="text-lg font-semibold mb-4">Rate Amenities</h3>
                    @foreach ($amenities as $icon => $name)
                        <div class="flex flex-col mb-4">
                            <i class="{{ $icon }} text-2xl"></i>
                            <div class="flex items-center space-x-2">
                                @for ($i = 1; $i <= 3; $i++)
                                    <button wire:click="setAmenityRating('{{ $name }}', {{ $i }})"
                                        class="{{ $amenityRatings[$name] >= $i ? 'text-yellow-400' : 'text-gray-300' }}">
                                        <i class="fas fa-star"></i>
                                    </button>
                                @endfor
                            </div>
                        </div>
                    @endforeach

                    <button wire:click="submitAmenityRatings" class="bg-blue-500 text-white px-4 py-2 rounded">Submit
                        Ratings</button>
                    <button onclick="closeAmenityRatingModal()" class="text-red-500 ml-2">Close</button>
                </div>
            </div>
        @endif

    @endif
</div>
<script>
    function openAmenityRatingModal() {
        document.getElementById('amenityRatingModal').style.display = 'flex';
    }

    function closeAmenityRatingModal() {
        document.getElementById('amenityRatingModal').style.display = 'none';
    }
</script>
