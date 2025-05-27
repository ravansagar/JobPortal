<?php

namespace App\Livewire;

use Auth;
use Hash;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;

#[Title("Change Password")]
class ChangePassword extends Component
{
    public $password, $current_password, $password_confirmation;

    public function UpdatePassword(){
        // dd($this->current_password);
        $this->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);


        Auth::user()->update([
            'password' => Hash::make($this->password),
        ]);
        
        return redirect()->intended(url()->previous());
    }
    public function render()
    {
        return view('livewire.change-password');
    }
}
