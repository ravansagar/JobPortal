<?php

namespace App\Livewire;

use App\Models\Job;

use Livewire\Component;
use App\Models\ApplyJob;

class JobCard extends Component
{
    public Job $job;
    public $currentUrl;
    public $noapp;

    public function mount($job){
        $this->noapp = ApplyJob::where('job_id',$job->id)->count();
    }

    public function showConfirmModal($jobId)
    {
        $this->dispatch('confirmModal', $jobId);
    }

    public function render()
    {
        return view('livewire.job-card');
    }
}
