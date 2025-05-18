<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Job;

#[Layout('components.layouts.base')] 
class JobView extends Component
{
    public $job;

    public function mount($id)
    {
        $this->job = Job::with('tag', 'user')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.job-view');
    }
}
