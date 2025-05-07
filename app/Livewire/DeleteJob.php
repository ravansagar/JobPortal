<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Job;

class DeleteJob extends Component
{
    public function delete($id){
        $job = Job::find($id);
        $job->delete();
        session()->flash('success', 'Job deleted successfully!');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.delete-job');
    }
}
