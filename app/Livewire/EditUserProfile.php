<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

#[Title("Update Profile")]
class EditUserProfile extends Component
{
    use WithFileUploads;
    
    public $user;

    #[Validate('required|min:3|string')]
    public $name;

    #[Validate('required|email')]
    public $email;

    #[Validate('required|integer|min:10')]
    public $phone;

    #[Validate('required|min:3|string')]
    public $location;

    #[Validate('max:2048|file|mimes:jpg,jpeg,png,gif')]
    public $profilePhoto;
    
    public $previousPhoto;
    
    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->previousPhoto = $this->user->image;
        $this->phone = $this->user->phone;
        $this->location = $this->user->location;
    }
    
    
    public function save()
    {   
        $photoPath = "";
        if ($this->profilePhoto) {

            if ($this->user->profile_photo) {
                Storage::delete($this->user->profile_photo);
            }
            $imageName = time() . '_' . $this->profilePhoto->getClientOriginalName();

            $this->profilePhoto->storeAs('images/user/', $imageName, 'public');
            $photoPath = 'storage/images/user/'.$imageName;
        }
        
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->phone = $this->phone;
        $this->user->location = $this->location;
        $this->user->image = $photoPath;
        $this->user->save();
        
        session()->flash('message', 'Profile updated successfully!');
        
        return redirect()->route('user.profile');
    }
    
    public function render()
    {
        return view('livewire.edit-user-profile');
    }
}
