<?php

namespace App\Livewire;


use Livewire\Component;
use Auth;

class DeleteAccount extends Component
{
    public $password;

    public function deleteAccount(){

        $this->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = Auth::user();

        Auth::logout();
        $user->delete();
        return redirect()->intended(route('home'));
    }
    public function render()
    {
        return view('livewire.delete-account');
    }
}
