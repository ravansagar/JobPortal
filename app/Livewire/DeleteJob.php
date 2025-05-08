<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Job;
use Auth;

class DeleteJob extends Component
{
    protected $listeners = ['confirmModal' => 'showConfirmModal', 'deleteJob' => 'delete'];

    public $jobId;
    public $showModal = false; 

    public function showConfirmModal($jobId)
    {
        $this->jobId = $jobId;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function delete($jobId)
    {
        $job = Job::findOrFail($jobId);

        if (auth()->id() === $job->user_id) {
            $job->delete();
            session()->flash('success', 'Job deleted successfully.');
        }
        else {
            session()->flash('error', 'Job not found or you are not authrized.');
        }
        return redirect()->route('myjobs.index');
    }

    public function render()
    {
        return view('livewire.delete-job');
    }
}
