<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class ContactPage extends Component
{
    public string $name    = '';
    public string $email   = '';
    public string $message = '';
    public bool   $success = false;

    protected array $rules = [
        'name'    => 'required|min:2|max:100',
        'email'   => 'required|email|max:100',
        'message' => 'required|min:10|max:2000',
    ];

    protected array $messages = [
        'name.required'    => 'Nama wajib diisi.',
        'email.required'   => 'Email wajib diisi.',
        'email.email'      => 'Format email tidak valid.',
        'message.required' => 'Pesan wajib diisi.',
        'message.min'      => 'Pesan minimal 10 karakter.',
    ];

    public function submit(): void
    {
        $this->validate();

        Contact::create([
            'name'    => $this->name,
            'email'   => $this->email,
            'message' => $this->message,
        ]);

        $this->reset(['name', 'email', 'message']);
        $this->success = true;
    }

    public function render()
    {
        return view('livewire.contact-page');
    }
}