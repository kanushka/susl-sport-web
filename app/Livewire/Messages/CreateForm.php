<?php

namespace App\Livewire\Messages;

use App\Models\Message;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;


use Livewire\Component;

class CreateForm extends Component
{
    #[Validate('required|min:5')]
    public $first_name = '';

    #[Validate('required|min:5')]
    public $last_name = '';

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required|digits:10')]
    public $phone = '';

    #[Validate('required|min:10')]
    public $message = '';


    public function save()
    {
        $this->validate();
        Message::create($this->all());
        Session::flash('status', 'contact-us-message-sent');
        return redirect()->route('contact');
    }

    public function render()
    {
        return view('livewire.messages.create-form');
    }
}