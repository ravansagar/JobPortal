<?php

namespace App\Livewire;

use Hash;
use Auth;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;

class RegistrationForm extends Component
{
    public $name, $email, $password, $password_confirmation, $role;

    public function setRoleAndRegister($role){
        $this->role = $role;
        $this->register();
    }
    public function register(){
        $validated = $this->validate([
            'name' => ['required','string','min:3'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:6','confirmed'],
            'role' => ['required','string'],
        ]);
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        Auth::login($user);
        
        if($user->role == 'admin'){
            return redirect()->route('admin');
        }

        else if($user->role == 'agent'){
            return redirect()->route('profile');
        }

        return redirect()->intended(route('home'));
    }
    

    

    public function render()
    {
        return view('livewire.registration-form');
    }
}
