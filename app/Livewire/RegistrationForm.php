<?php

namespace App\Livewire;

use Hash;
use Auth;
use Livewire\Component;
use App\Models\User;

class RegistrationForm extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function register(){
        
        $validated = $this->validate([
            'name' => ['required','string','min:3'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:6','confirmed'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->intended(route('profile'));

    }
    

    

    public function render()
    {
        return view('livewire.registration-form');
    }
}
