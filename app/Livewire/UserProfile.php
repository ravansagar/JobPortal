<?php

namespace App\Livewire;

use App\Models\ApplyJob;
use App\Models\User;
use Auth;
use Livewire\Component;
use Illuminate\Support\Facades\URL;

class UserProfile extends Component
{
    public $user;
    public $activeTab = 'profile';
    public $applications = [];
    public $profilePhoto;
    public $route;
    public function mount($id = null)
    {
        $currentUser = Auth::user();

        if (!$id) {
            $this->user = $currentUser;
            $this->loadApplications();
        } else {
            $requestedUser = User::findOrFail($id);
            if (($currentUser->role == 'admin') || ($currentUser->id === $requestedUser->id)) {
                $this->user = $requestedUser;
            } else {
                abort(403);
            }
        }

        $this->activeTab = request()->query('tab') === 'a' ? 'applications' : 'profile';
    
        $this->profilePhoto = $this->user->image;

        $this->activeTab = request()->input('tab', 'profile') === 'a' 
            ? 'applications' 
            : 'profile';

        $this->profilePhoto = $this->user->image;
        
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
