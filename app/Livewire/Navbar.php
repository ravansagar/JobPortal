<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $navLinks;
    public $startUp;

    public function mount()
    {
        $this->navLinks = [
            ['name' => 'Home', 'url' => '/', 'active' => request()->is('/')],
            ['name' => 'MyJobs', 'url' => '/myjobs', 'active' => request()->is('myjobs')],
            ['name' => 'Admin Dashboard', 'url' => '/admin', 'active' => request()->is('admin')],
            ['name' => 'Vacancy', 'url' => '/vacancy', 'active' => request()->is('vacancy')],
        ];

        $this->startUp = [
            ['name' => 'Login', 'url' => '/login', 'active' => request()->is('login')],
            ['name' => 'Register', 'url' => '/register', 'active' => request()->is('register')],
        ];

        // Add login/logout based on authentication
        // if (Auth::check()) {
        //     $this->navLinks[] = ['name' => 'Logout', 'url' => '/logout', 'active' => request()->is('logout')];
        // } else {
        //     $this->navLinks[] = ['name' => 'Login', 'url' => '/login', 'active' => request()->is('login')];
        //     $this->navLinks[] = ['name' => 'Register', 'url' => '/register', 'active' => request()->is('register')];
        // }
    }
    public function render()
    {
        return view('livewire.navbar');
    }
}
