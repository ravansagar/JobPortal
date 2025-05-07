<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;

class LoginForm extends Component
{
    public $email;
    public $password;

    public function login(){
        $this->validate([
            "email" => ["required", "email"],
            "password"=> ["required","min:6"],
        ]);

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
            if(Auth::user()->company_id == '')
                return redirect()->intended(route("profile"));
            else 
                return redirect()->intended(route("home"));
        }
        session()->flash("error","Invalid Credentials");
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
