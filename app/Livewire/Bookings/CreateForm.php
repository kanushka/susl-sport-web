<?php

namespace App\Livewire\Bookings;

use App\Models\Booking;
use App\Models\Message;
use App\Models\Venue;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;


use Livewire\Component;

class CreateForm extends Component
{
    #[Validate('required')]
    public $venue_id = '';
    public $allVenues = [];

    #[Validate('required|date|after:today')]
    public $start_date = '';

    #[Validate('required|numeric|min:100|max:1000')]
    public $attendees = 100;

    #[Validate('required|digits:10')]
    public $phone = '';

    #[Validate('required|min:10|max:5000')]
    public $reason = '';

    public $user_id;

    public function mount()
    {
        $this->allVenues = Venue::all();
        $this->venue_id = $this->allVenues->first()->id;
        $this->start_date = now()->addDays(1)->format('Y-m-d');
        $this->user_id = auth()->id();
    }

    public function save()
    {
        $this->validate();
        // additional validation to check if start date is already booked for the selected venue
        $existingBooking = Booking::where('venue_id', $this->venue_id)
            ->where('start_date', $this->start_date)
            ->first();

        if ($existingBooking) {
            $this->addError('start_date', 'The selected date is already booked for this venue. Please select another date.');
            return;
        }

        Booking::create($this->all());
        Session::flash('status', 'booking-request-sent');
        return redirect()->route('booking');
    }

    public function render()
    {
        return view('livewire.bookings.create-form');
    }
}
