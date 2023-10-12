<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div x-data="{ isOpen: false }">
        <input
            wire:model="query"
            @focus="isOpen = true"
            @blur="isOpen = false"
            class="border px-4 py-2"
            placeholder="Search..."
        >

        <div
            x-show.transition="isOpen"
            class="absolute z-10 w-full bg-white border mt-2"
        >
            @forelse($results as $result)
                <a href="#" class="block p-4 border-b">
                    {{ $result->name }}
                </a>
            @empty
                <span class="block p-4">No results found!</span>
            @endforelse
        </div>
    </div>

</div>
