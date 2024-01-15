<?php

namespace App\Livewire\Events;

use App\Models\Event;
use App\Models\User;
use Livewire\Component;

class ListView extends Component
{
    public $events = [];

    public function mount()
    {
        if (auth()->user()->role == 'admin') {
            $this->events = Event::all();
        } else {
            $user = User::find(auth()->user()->id);
            $userSports = $user->sports()->pluck('id');

            $this->events = Event::whereIn('sport_id', $userSports)
                ->where('start_date', '>=', now()->toDateString())
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.events.list-view');
    }
}
