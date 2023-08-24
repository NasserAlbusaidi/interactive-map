<div>

    <div class="px-4 py-2 border-b">
        <h3 class="text-lg font-semibold">{{ $name }}</h3>
        <p class="text-xs text-blue-300">{{ $address }}</p>
    </div>
    @if ($image)
        <div class="px-4 py-2">
            <img src="{{ $image }}" alt="Bathroom Image" class="w-full h-40 object-cover rounded-md">
        </div>
    @else
        <div class="px-4 py-2">
            <img src="https://via.placeholder.com/640x360.png?text=No+Image" alt="Bathroom Image"
                class="w-full h-40 object-cover rounded-md">
        </div>
    @endif
    @if ($amenities)
        <div class="grid grid-cols-4 gap-2 px-4 py-2 border-t">
            <h4 class="text-md font-semibold col-span-4 mb-2">Amenities</h4>
            @foreach ($amenities as $amenity)
                <div class="text-center text-lg text-gray-700 flex flex-col items-center">
                    <i class="{{ $amenity['icon'] }}"></i>
                    <div class="flex items-center space-x-2 pb-2">
                        @for ($i = 1; $i <= 3; $i++)
                            <i
                                class="fas fa-star {{ $amenityRatings[$amenity['name']] ?? 0 >= $i ? 'text-yellow-400' : 'text-gray-300' }} w-2 h-1 mt-2 pb-2 "></i>
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>
    @endif






    <div class="px-4 py-2 border-t">
        <div class="flex items-center justify-between mb-2">
            <h4 class="text-md font-extrabold">Reviews</h4>
            @if ($averageRating > 0)
                <div class="flex items-center">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= ($averageRating))
                            <i class="fas fa-star text-yellow-400"></i> <!-- Full star -->
                        @elseif ($i <= ($averageRating * 2) / 2)
                        aa
                            <i class="fa-solid fa-star-sharp-half text-yellow-400"></i> <!-- Half star -->
                        @else
                            <i class="far fa-star text-gray-300"></i> <!-- Empty star -->
                        @endif
                    @endfor
                    <span class="text-sm ml-2 font-bold">{{ $averageRating }}/5</span>
                </div>
            @else
                <div class="flex items-center">
                    <i class="fas fa-star text-gray-300"></i> <!-- Single gray star for zero rating -->
                </div>
            @endif

        </div>
        {{-- {{$bathroomId}} --}}


        @livewire('add-review', ['bathroomId' => $bathroomId])


        @if ($reviews)
            <div>
                @foreach ($reviews as $review)
                    <div class="border-t pt-2">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-bold">{{ $review['author'] }}</p>
                            <div class="flex">
                                @for ($i = 1; $i <= 5; $i++)
                                    <!-- Assuming you want to display 5 stars -->
                                    @if ($i <= floor($review['rating']))
                                        <i class="fas fa-star text-yellow-400"></i> <!-- Full star -->
                                    @elseif ($i <= floor($review['rating'] * 2) / 2)
                                        <i class="fa-solid fa-star-sharp-half text-yellow-400"></i> <!-- Half star -->
                                    @else
                                        <i class="far fa-star text-yellow-400"></i> <!-- Empty star -->
                                    @endif
                                @endfor
                                <p class="text-xs ml-2 text-gray-600">{{ $review['rating'] }}.0</p>
                            </div>
                        </div>
                        @php
                            $votes = $this->getVotes($review['id']);
                        @endphp
                        <div class="flex items-center">

                            <button wire:click="voteReview({{ $review['id'] }}, true)"
                                {{ auth()->id() == $review['user_id'] ? 'disabled' : '' }}>
                                <i
                                    class="fas fa-thumbs-up {{ auth()->id() == $review['user_id'] ? 'text-gray-300' : 'text-green-500' }}"></i>
                            </button>
                            <span class="text-xs mx-1">{{ $votes['upvotes'] }}</span>
                            <button wire:click="voteReview({{ $review['id'] }}, false)"
                                {{ auth()->id() == $review['user_id'] ? 'disabled' : '' }}>
                                <i
                                    class="fas fa-thumbs-down {{ auth()->id() == $review['user_id'] ? 'text-gray-300' : 'text-red-500' }}"></i>

                            </button>
                            <span class="text-xs mx-1">{{ $votes['downvotes'] }}</span>
                        </div>


                        <div>
                            <p class="text-xs">{{ $review['text'] }}</p>
                            <span class="text-xs text-gray-500">{{ $review['date'] }}</span>
                        </div>
                @endforeach
            </div>
        @else
            <p class="text-xs">No reviews yet.</p>
        @endif
    </div>

</div>
