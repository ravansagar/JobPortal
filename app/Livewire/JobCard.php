<?php

namespace App\Livewire;

use App\Models\Job;

use Livewire\Component;

class JobCard extends Component
{
    public Job $job;

    public function render()
    {
        return view('livewire.job-card');
    }
}
