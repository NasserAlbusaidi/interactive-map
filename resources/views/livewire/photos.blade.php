<div>
    {{-- <!-- Button to Open the Modal -->
    <button wire:click="openModal">Upload Image</button>

   <!-- Modal -->
<div class="fixed inset-0 z-50 flex items-center justify-center" style="background-color: rgba(0,0,0,0.4);" wire:if="$showModal">
    <div class="bg-white p-4 rounded-lg m-2 max-w-xl mx-auto relative shadow-lg">
        <button wire:click="closeModal" class="absolute right-0 top-0 m-2">X</button>
        <form wire:submit.prevent="uploadImage">
            <input type="file" wire:model="image">
            <button type="submit">Upload</button>
        </form>
    </div>
</div> --}}


    <!-- Carousel for Images -->
    @if ( $images && $images->count() > 0)
        <div class="carousel">
            @foreach ($images as $image)

                <div class="px-4 py-2">
                    <img src= {{ asset('storage/' . $image->path) }} alt="Bathroom Image"
                        class="w-full h-40 object-cover rounded-md">
                </div>
            @endforeach
        </div>
    @else
        <div class="px-4 py-2">
            <img src="https://via.placeholder.com/640x360.png?text=No+Image" alt="Bathroom Image"
                class="w-full h-40 object-cover rounded-md">
        </div>
    @endif
</div>


