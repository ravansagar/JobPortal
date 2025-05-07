<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Job;
use Route;
use Auth;

class JobList extends Component
{
    public $search = '';

    use WithPagination;
    public $perPage = 8;
    protected $paginationTheme = 'tailwind';

    protected $listeners = ['setSearch' => 'setSearch'];

    public function setSearch($value)
    {
        $this->search = $value;
    }

    public function getJobs(){
        $currentRoute = Route::getCurrentRoute();
        $jobs = Job::class;
        if ($currentRoute->uri == 'myjobs') {
            $userId = Auth::user()->id;
            $jobs = ($this->search !== '') ?
                Job::where('user_id', $userId) 
                    ->where(function ($query) { 
                        $query->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('description', 'like', '%' . $this->search . '%');
                    })
                    ->paginate($this->perPage) :
                    Job::where('user_id', $userId)->paginate($this->perPage);
        } else {
            $jobs = ($this->search !== '') ?
                Job::where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhereHas('tag', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->paginate($this->perPage) :
    
                Job::paginate($this->perPage);
        }
        return $jobs;
    }

    public function render()
    {
        $jobs = $this->getJobs();
        return view('livewire.job-list', compact('jobs'));
    }
}
