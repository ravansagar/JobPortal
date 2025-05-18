<?php

namespace App\Livewire;

use App\Models\ApplyJob;
use Auth;
use Livewire\Component;

class UserProfile extends Component
{
    public $user;
    public $activeTab = 'profile';
    public $applications = [];
    public $profilePhoto;
    
    public function mount()
    {
        $this->user = Auth::user();
        $this->profilePhoto = $this->user->image;
        $this->loadApplications();
    }
    
    public function loadApplications()
    {
        $this->applications = ApplyJob::where('user_id', $this->user->id)
            ->with('job')
            ->latest()
            ->get();
    }
    
    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }
    public function render()
    {
        return view('livewire.user-profile');
    }
}
