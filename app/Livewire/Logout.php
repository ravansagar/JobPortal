<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;
use Livewire\Attributes\On;

class Logout extends Component
{
    #[On('logout')]
    public function logout()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();
        
        return redirect('/'); 
    }
    public function render()
    {
        return view('livewire.logout');
    }
}
