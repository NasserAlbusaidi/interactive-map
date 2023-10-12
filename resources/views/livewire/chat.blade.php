<div>
    <div class="overflow-y-auto h-96 mb-4 border">
        @foreach($messages->sortBy('created_at') as $message)
            <div class="p-2">
                <strong style="color: {{ '#' . substr(md5($message->user->name), 0, 6) }};">{{ $message->user->name }}:</strong> {{ $message->body }}
            </div>
        @endforeach
    </div>
    <input type="text" wire:model="message" class="border p-2 w-full">
    <button wire:click="sendMessage" class="p-2 bg-blue-500 text-white mt-2">Send</button>
</div>

