<?php

namespace App\Livewire\Bookings;

use Livewire\Component;

class Auth extends Component
{
    public function authRedirect()
    {
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.bookings.auth');
    }
}
