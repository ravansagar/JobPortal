<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tag;

class AddTag extends Component
{
    public $name;
    public $showModal = false; 
    protected $listeners = ['confirmModal' => 'showConfirmModal'];
    public $errorMessage = null; 

    public $tag_id;


    public function showConfirmModal()
    {
        $this->resetErrorBag();
        $this->reset(['name', 'errorMessage']);
        $this->showModal = true;
    }
    public function closeModal()
    {
        $this->showModal = false;
    }

    public function addTag()
    {
        $this->validate([
            'name' => ['required', 'min:2'],
        ]);

        $nameLower = strtolower(trim($this->name));

        if (Tag::whereRaw('LOWER(name) = ?', [$nameLower])->exists()) {
            $this->errorMessage = 'Tag already exists!';
            return;
        }

        $tag = Tag::create(['name' => $this->name]);
        
        $this->dispatch('tagAdded', $tag->id);

        $this->closeModal();
        session()->flash('success', 'Tag added successfully!');
    }
    public function render()
    {
        return view('livewire.add-tag', [
            'tags' => Tag::all()
        ]);
    }
}
