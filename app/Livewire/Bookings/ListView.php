<?php

namespace App\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Component;

class ListView extends Component
{
    public $bookings = [];

    public function mount()
    {
        $this->bookings = Booking::all();
    }

    public function render()
    {
        return view('livewire.bookings.list-view');
    }
}
