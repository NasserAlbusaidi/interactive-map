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
            <div class="text-center text-lg text-gray-700">
                <i class="{{ $amenity['icon'] }}"></i>
            </div>
        @endforeach
    </div>


@endif


    <div class="px-4 py-2 border-t">
        <div class="flex items-center justify-between mb-2">
            <h4 class="text-md font-extrabold">Reviews</h4>
            <div class="flex items-center">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="fas fa-star text-yellow-400 {{ $averageRating >= $i ? '' : 'text-gray-300' }}"></i>
                @endfor
                <span class="text-sm ml-2 font-bold">{{ $averageRating }}/5</span>
            </div>
        </div>
        @if ($reviews)
            <div>
                @foreach ($reviews as $review)
                    <div class="border-t pt-2">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-bold">{{ $review['author'] }}</p>
                            <div class="flex">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= floor($review['rating']))
                                        <i class="fas fa-star text-yellow-400"></i> <!-- Full star -->
                                    @elseif ($review['rating'] > $i - 1 && $review['rating'] < $i)
                                        <i class="fas fa-star-half-alt text-yellow-400"></i> <!-- Half star -->
                                    @else
                                        <i class="far fa-star text-yellow-400"></i> <!-- Empty star -->
                                    @endif
                                @endfor
                                <p class="text-xs ml-2 text-gray-600">{{ $review['rating'] }}.0</p>
                            </div>
                        </div>
                        <p class="text-xs">{{ $review['text'] }}</p>
                        <span class="text-xs text-gray-500">{{ $review['date'] }}</span>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>

<script>
    console.log('Bathroom details component loaded.');
</script>
