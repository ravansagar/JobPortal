<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;


#[Layout("components.layouts.app")]
class UpdateInformation extends Component
{
    use WithFileUploads;

    public $name, $email, $image, $currentImage, $cname, $logo, $location;
    public $data = [];

    public $successMsg, $errorMsg;

    public function updateData()
    {
        // $this->reset(['successMsg', 'errorMsg']);

        $user = Auth::user();

        $UserData = [];

        $CompanyData = [];

        if (!is_null($this->name) && $this->name !== $user->name) { 
            $this->validate(["name" => ["required", 'string', 'min:3']]);
            $UserData['name'] = $this->name;
        }

        if (!is_null($this->email) && $this->email !== $user->email) {
            $this->validate(["email" => ["required", 'email', 'unique:users,email'. Auth::id()]]);
            $UserData['email'] = $this->email;
        }

        if (!is_null($this->image) && $this->image !== $user->image) {
            
            $this->validate([
                'image' => ['image', 'max:5120'],
            ]);

            $imageName = time() . '_' . $this->image->getClientOriginalName();
            $this->image->storeAs('images', $imageName, 'public');

            $UserData['image'] = 'storage/images/' . $imageName;

        }

        if (!is_null($this->cname) && $this->cname !== $user->company?->name) {
            $this->validate(["cname" => ["required", "string", "min:3"]]);
            $CompanyData["name"] = $this->cname;
        }

        if (!is_null($this->location) && $this->location !== $user->company?->location) {
            $this->validate(["location" => ["required", "string"]]);
            $CompanyData["location"] = $this->location;
        }

        if (!is_null($this->logo) && $this->logo !== $user->company?->image) {
            // dd('i am here');
            $this->validate([
                'logo' => ['required', 'image', 'max:5120'],
            ]);
            $imageName = time() . '_' . $this->logo->getClientOriginalName();
            $this->logo->storeAs('images/company_logo', $imageName, 'public');
            $imagePath = 'storage/images/company_logo/' . $imageName;
            $CompanyData['image'] = $imagePath;

        }

        if (!empty($UserData)) {
            $result = Auth::user()->update($UserData);
            $result ? session()->flash('success', 'Profile information updated successfully.') : 
                session()->flash('error', 'Failed to update profile information.');
        }

        
        if (!empty($CompanyData)) {
            $company = Auth::user()->company;
            if ($company == null) {
                return;
            }
            $result = $company->update($CompanyData);
            $result ? $this->successMsg = 'Company information updated successfully.' :
                $this->errorMsg = "Company to update profile information.";

            $result ? session()->flash('successc', 'Company information updated successfully.') : 
                session()->flash('error', 'Failed to update company information.');
        }

        return redirect()->route('profile.edit');
    }

    public function mount()
    {
        $user = Auth::user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->currentImage = $user->image;

        if ($user->company) {
            $this->cname = $user->company->name;
            $this->location = $user->company->location;
            $this->logo = $user->company->image;
        }
    }

    public function render()
    {
        return view('livewire.update-information');
    }
}
