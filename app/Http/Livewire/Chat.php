<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;

class Chat extends Component
{
    public $message = '';
    public $messages = [];

    public function mount()
    {
        $this->messages = Message::latest()->get();
    }

    public function sendMessage()
{
    $newMessage = Message::create([
        'body' => $this->message,
        'user_id' => auth()->id()
    ]);

    $this->messages->prepend($newMessage);
    $this->message = '';
}


    public function render()
    {
        return view('livewire.chat');
    }
}

