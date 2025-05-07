<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Job;
use App\Models\Tag;

#[Layout('layouts.base')] 
class UpdateJob extends Component
{
    public $job, $tags = [];
    public $name, $salary, $description, $image, $tagId, $tagName;

    public function mount($id){
        $this->job = Job::findOrFail( $id);
        $this->name = $this->job->name;
        $this->salary = $this->job->salary;
        $this->description = $this->job->description;
        $this->image = $this->job->image;
        $this->tagId = $this->job->tag;
        $this->tagName = $this->tagId->name;
        $this->tags = Tag::all();
    }
    public function render()
    {
        return view('livewire.update-job');
    }
}
