<?php

namespace App\Livewire\Events;

use App\Models\Event;
use App\Models\Sport;
use App\Models\Venue;
use App\Notifications\EventPublished;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Notification;

use Livewire\Component;

class CreateForm extends Component
{
    use WithFileUploads;

    #[Validate('required|exists:sports,id')]
    public $sport_id = '';

    #[Validate('required|string|min:3|max:255')]
    public $name = '';

    #[Validate('required|string|min:3|max:5000')]
    public $description = '';

    #[Validate('nullable|exists:venues,id')]
    public $venue_id = '';
    
    #[Validate('required|date|after:today')]
    public $start_date = '';

    #[Validate('nullable|image|max:1024')] // 1MB Max
    public $photo;
    
    public $allSports = [];
    public $allVenues = [];
    public $user_id;

    public function mount()
    {
        $this->allSports = Sport::all();
        $this->sport_id = $this->allSports->first()->id;
        $this->allVenues = Venue::all();
        $this->venue_id = $this->allVenues->first()->id;
        $this->start_date = now()->addDays(1)->format('Y-m-d');
        $this->user_id = auth()->id();
    }

    public function save()
    {
        // additional validation to check if start date is already booked for the selected venue
        $existingBooking = Event::where('venue_id', $this->venue_id)
        ->where('start_date', $this->start_date)
        ->first();
        
        if ($existingBooking) {
            $this->addError('start_date', 'The selected date is already booked for this venue. Please select another date.');
            return;
        }
        $this->validate();

        $event = Event::create($this->all());

        if ($this->photo) {
            $path = $this->photo->storePublicly('photos', 'public');
            $event->update(['image' => $path]);
        }

        // send notifications to all users who have subscribed to the sport
        $sport = Sport::find($this->sport_id);
        $subscribers = $sport->users()->get();
        Notification::send($subscribers, new EventPublished($event));

        Session::flash('status', 'event-added');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.events.create-form');
    }
}
