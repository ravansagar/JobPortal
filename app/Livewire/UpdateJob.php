<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Job;
use App\Models\Tag;
use Auth;

// #[Layout('layouts.base')]
class UpdateJob extends Component
{
    use WithFileUploads;

    public $job, $tags = [];
    public $name, $salary, $description, $image, $tag_id, $tagName;

    public function updateData()
    {
        $userId = Auth::id();

        if ($this->job->user_id != $userId) {
            return;
        }

        $data = [];

        if ($this->image) {
            $this->validate(['image' => ['image', 'max:5120']]);
            $imageName = time() . '_' . $this->image->getClientOriginalName();
            $this->image->storeAs('images/job_icons', $imageName, 'public');
            $imagePath = 'storage/images/job_icons/' . $imageName;
            $data['image'] = $imagePath;
        }

        if (!is_null($this->name) && $this->name != $this->job->name) {
            $this->validate(['name' => ['required', 'string', 'min:3']]);
            $data['name'] = $this->name;
        }

        if (!is_null($this->salary) && $this->salary != $this->job->salary) {
            $this->validate(['salary' => ['required', 'numeric']]);
            $data['salary'] = $this->salary;
        }

        if (!is_null($this->description) && $this->description != $this->job->description) {
            $this->validate(['description' => ['required', 'min:10']]);
            $data['description'] = $this->description;
        }

        if (!is_null($this->tag_id) && $this->tag_id != $this->job->tag_id) {
            $this->validate(['tag_id' => ['required', 'integer']]);
            $data['tag_id'] = $this->tag_id;
        }

        if (!empty($data)) {
            $this->job->update($data);
        }

        session()->flash('success', 'Job updated successfully.');
        return redirect()->back();
    }


    public function mount($id)
    {
        $this->job = Job::findOrFail($id);
        $this->name = $this->job->name;
        $this->salary = $this->job->salary;
        $this->description = $this->job->description;
        $this->tag_id = $this->job->tag_id;
        $this->tagName = $this->job->tag->name;
        $this->tags = Tag::all();
    }
    public function render()
    {
        return view('livewire.update-job');
    }
}
