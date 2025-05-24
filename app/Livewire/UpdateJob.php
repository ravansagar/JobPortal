<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Models\Job;
use App\Models\Tag;
use Auth;
use Livewire\Attributes\On;

#[Layout("components.layouts.base")]
class UpdateJob extends Component
{
    use WithFileUploads;

    public $job, $tags = [];
    public $name, $currency, $salary, $description, $image, $tag_id, $tagName;

    public $newTag = '';
    public $showAddTag = false;

    protected $listeners = ['tagAdded'];

    public function tagAdded($tagId)
    {
        $this->tags = Tag::all();
        $this->tag_id = $tagId;
    }
    public function showConfirmModal()
    {
        $this->dispatch('confirmModal');
    }

    public function updateData()
    {
        $userId = Auth::id();

        if ($this->job->user_id != $userId) {
            return;
        }

        $data = [];
        $status = false;

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

        if (!is_null($this->currency) && $this->currency != $this->job->currency) {
            $this->validate(['currency' => ['required', 'string', 'min:3']]);
            $data['currency'] = $this->currency;
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
            // dd($data);
            $status = $this->job->update($data);
        }

        $status ? session()->flash('success', 'Job updated successfully.') : session()->flash('error', 'Error while updating job');
        return $status ? redirect(route('myjobs.index'), 200) : redirect()->back();
    }


    public function mount($id)
    {
        $this->job = Job::findOrFail($id);
        $this->name = $this->job->name;
        $this->currency = $this->job->currency;
        $this->salary = $this->job->salary;
        $this->description = $this->job->description;
        $this->tag_id = $this->job->tag_id;
        $this->tagName = $this->job->tag->name;
        $this->tags = Tag::all();
        // dump($this->description);
        $this->dispatch('descriptionUpdated', value: $this->description);
    }

    #[On('setDescription')]
    public function setDescription($value)
    {
        $this->description = $value; // ✅ receive changes from editor
    }

    public function render()
    {
        return view('livewire.update-job');
    }
}
