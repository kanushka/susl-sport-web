<?php

namespace App\Livewire\Notifications;

use App\Models\User;
use Livewire\Component;

class ListView extends Component
{
    public $notifications = [];

    public function mount()
    {
        $userId = auth()->id();
        $user = User::find($userId);
        $this->notifications = $user->notifications()->get();
    }

    public function render()
    {
        return view('livewire.notifications.list-view');
    }
}
