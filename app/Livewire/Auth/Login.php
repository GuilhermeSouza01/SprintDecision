<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate(['required', 'email'])]
    public string $email = '';
    #[Validate(['required', 'string'])]
    public string $password = '';

    public function handle(): void
    {
        $this->validate();

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password], true)) {
            session()->regenerate();
            $this->redirectRoute('home');
        }
        $this->addError('email', 'Invalid email or password');
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
