<?php

namespace App\Livewire;

use App\Models\Job;
use App\Models\Tag;
use App\Models\Company;
use Livewire\Component;

class BasicInfo extends Component
{
    public $job;
    public $tag;
    public $company;


    public function mount(){
        $this->job = Job::count();
        $this->tag = Tag::count();
        $this->company = Company::count();
    }
    public function render()
    {
        return view('livewire.basic-info');
    }
}
