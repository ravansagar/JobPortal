<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Job;
use App\Models\ApplyJob;
use Auth;


#[Layout("components.layouts.base")]
class Apply extends Component
{
    use WithFileUploads;

    public $job;
    public $name, $email, $resume, $coverLetter;
    protected $cv;

    public function apply()
    {
        $this->validate([
                'name' => 'required|min:3|string',
                'email' => 'required|email',
                'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
                'coverLetter' => 'nullable|min:3'
            ],
            [
                'resume.max' => 'The resume file size must not exceed 2MB.',
            ]
        );

        if ($this->resume) {
            $this->cv = time() . '_' . $this->resume->getClientOriginalName();
            $this->resume->storeAs('job/resume', $this->cv, 'public');
            $this->cv = 'storage/images/job/resume/' . $this->cv;
        }

        $count = ApplyJob::where('job_id', $this->job->id)
                        ->where('user_id', Auth::id())
                        ->count();
        // dump($count);
        if($count > 0){
            session()->flash('success', 'Application already submitted');
            $this->reset('name', 'email', 'coverLetter', 'resume');
            $this->cv = null;
            return;
        }
        
        $result = ApplyJob::create([
            'name' => $this->name,
            'email' => $this->email,
            'resume' => $this->cv,
            'cover_letter' => $this->coverLetter,
            'job_id' => $this->job->id,
            'user_id' => Auth::user()->id
        ]);

        if ($result) {
            session()->flash('success', 'Application successfully submitted');
        } else {
            session()->flash('error', 'Error while submitting application');
        }
        
        $this->reset('name', 'email', 'coverLetter', 'resume');

        $this->cv = null;
    }

    public function mount($id)
    {
        $this->job = Job::findOrFail($id);
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {
        return view('livewire.apply');
    }
}
