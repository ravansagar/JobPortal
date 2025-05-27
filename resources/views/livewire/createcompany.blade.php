<?php

use Livewire\Volt\Component;
use App\Models\Company;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Attributes\On;

new class extends Component {

    use WithFileUploads;
    use WithPagination;
    public $showModal = false;

    public $name, $image, $location;

    #[On('addCompany')]
    public function addCompany()
    {
        $this->showModal = true;
    }

    public function save()
    {
        $imagePath = null;

        $this->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:1024',
            'location' => 'required|string|min:3|max:255',
        ]);

        if($this->image){
            $imageName = time() . '_' . $this->image->getClientOriginalName();
            $this->image->storeAs('images/company_logo', $imageName, 'public');
            $imagePath = 'storage/images/company_logo/' . $imageName;
        }

        $company = Company::create([
            'name' => $this->name,
            'image' => $this->image ? $imagePath : null,
            'location' => $this->location,
        ]);

        $company ? session()->flash('success', 'Company created successfully.') :
            session()->flash('error', 'Failed to create company.');

        $this->showModal = false;
        $this->resetPage();
    }
}; ?>

<div>
    @if($showModal)
        <div class="fixed inset-0 flex items-center justify-center z-[9999]">
            <div class="bg-gray-100 text-white rounded-lg p-6 w-full max-w-md shadow-lg text-center">
                <h2 class="text-xl font-bold mb-2 text-gray-800">Add New Company</h2>
                <form wire:submit.prevent="save" class="flex flex-col space-y-4">

                    <label for="name" class="flex justify-start font-semibold text-md text-black">Compnay Name</label>
                    <x-form.input-field name="name" placeholder="Company Name" />

                    <label for="name" class="flex justify-start font-semibold text-md text-black">Compnay Logo</label>
                    <x-form.input-field type="file" name="image" placeholder="Company Logo" />

                    <label for="name" class="flex justify-start font-semibold text-md text-black">Compnay Location</label>
                    <x-form.input-field name="location" placeholder="Company Location" />

                    <div class="flex justify-center space-x-4">
                        <button type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded font-semibold hover:bg-green-600">Save</button>
                        <button type="button" wire:click="$set('showModal', false)"
                            class="bg-gray-300 text-black px-4 py-2 rounded font-semibold hover:bg-gray-400">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>