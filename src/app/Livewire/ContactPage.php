<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactPage extends Component
{
    public string $name = '';
    public string $email = '';
    public string $message = '';

    public function submit()
    {
        $this->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required',
        ]);

        Contact::create([
            'name'    => $this->name,
            'email'   => $this->email,
            'message' => $this->message,
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-page');
    }
}