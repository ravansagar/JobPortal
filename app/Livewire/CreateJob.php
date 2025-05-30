<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Attributes\Layout;
use App\Models\Job;
use Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title("Create Job")]
#[Layout("components.layouts.base")]
class CreateJob extends Component
{
    use WithFileUploads;
    public $tags = [];
    public $name, $image, $currency = "npr", $salary, $description, $tag_id;
    protected $listeners = ['tagAdded'];

    public function tagAdded($id)
    {
        $this->tags = Tag::all();
        $this->tag_id = $id;
        $this->render();
    }

    public function showConfirmModal()
    {
        $this->dispatch( 'confirmModal');
    }

    public function store()
    {
        $status = false;
        $this->validate([
            'name' => ['required', 'min:3'],
            'image' => ['nullable', 'image', 'max:5120'],
            'description' => ['required', 'min:10'],
            'salary' => ['required', 'numeric'],
            'tag_id' => ['required', 'integer'],
            'currency' => ['required', 'string', 'min:3']
        ]);
        
        $imagePath = null;
        if ($this->image) {
            $imageName = time() . '_' . $this->image->getClientOriginalName();
            $this->image->storeAs('images/job_icons', $imageName, 'public');
            $imagePath = 'storage/images/job_icons/' . $imageName;
        }
        
        $status = Job::create([
            'name' => $this->name,
            'currency' => $this->currency,
            'salary' => $this->salary,
            'description' => $this->description,
            'tag_id' => $this->tag_id,
            'user_id' => Auth::id(),
            'image' => $imagePath,
        ]);
        
        $status ? session()->flash('success', 'Job created successfully!') : session()->flash('error', 'Failed to create job');
        return $status ? redirect(route('myjobs.index'), 200) : redirect()->back();
    }

    public function mount()
    {
        $this->tags = Tag::all();
    }
    public function render()
    {
        return view('livewire.create-job');
    }
}
