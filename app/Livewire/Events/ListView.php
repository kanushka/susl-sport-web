<?php

namespace App\Livewire\Events;

use App\Models\Event;
use App\Models\Sport;
use App\Models\User;
use Livewire\Component;

class ListView extends Component
{
    public $events = [];
    public $sportName;

    public function mount()
    {
        if ($this->sportName) {
            // render events for a specific sport
            $sport = Sport::where('name', $this->sportName)->first();
            $this->events = Event::where('sport_id', $sport->id)
                ->where('start_date', '>=', now()->toDateString())
                ->get();
        } else if (auth()->user()->role == 'admin') {
            // render all events for admin
            $this->events = Event::all();
        } else {
            // render events for user's sports
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
