<?php

namespace App\Livewire\Messages;

use App\Models\Message;
use Livewire\Component;

class ListView extends Component
{
    public $messages = [];

    public function mount()
    {
        $this->messages = Message::all();
    }

    public function render()
    {
        return view('livewire.messages.list-view');
    }
}
