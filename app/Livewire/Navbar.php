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
            ['name' => 'Applied Jobs', 'url' => route('user.profile', ['id' => auth()->id(), 'tab' => 'a']), 'active' => request()->routeIs('user.profile') && request()->query('tab') === 'a'],
            ['name' => 'Admin Dashboard', 'url' => '/admin-2003-december', 'active' => request()->is(['admin-2003-december', 'admin-2003-december/*'])],
            ['name' => 'Vacancy', 'url' => '/vacancy', 'active' => request()->is('vacancy')],
        ];

        $this->startUp = [
            ['name' => 'Login', 'url' => '/login', 'active' => request()->is('login')],
            ['name' => 'Register', 'url' => '/register', 'active' => request()->is('register')],
        ];
    }
    public function render()
    {
        return view('livewire.navbar');
    }
}
