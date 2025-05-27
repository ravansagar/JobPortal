<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Title("Vacancy")]
#[Layout("components.layouts.app")]
class Vacancy extends Component
{
    public function render()
    {
        return view('livewire.vacancy');
    }
}
