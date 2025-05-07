<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Job;
use Livewire\WithFileUploads;
use Auth;
use App\Models\Company;

class ProfilePage extends Component
{
    use WithFileUploads;

    public  $image, $company_id, $name, $location, $logo;    
    
    public function updatedImage()
    {
        $this->validate([
            'image' => 'required|image|max:5120',
        ]);

        $imageName = time() . '_' . $this->image->getClientOriginalName();
        $this->image->storeAs('images', $imageName, 'public');

        $user = Auth::user();
        $user->image = 'storage/images/' . $imageName;
        $user->save();

        session()->flash('success', 'Profile image updated automatically.');
    }

    public function createCompany(){
        
        $validated = $this->validate([
            'name' => ['required', 'string','min:3'],
        ]);
        
        $company = Company::create($validated);

        Auth::user()->update([
            'company_id' => $company->id,
        ]);

        return redirect()->intended(route('profile'));
    }

    public function updateCompany($logo = null){

        $company = Auth::user()->company;

        if(!$company){
            return;
        }

        $data = [];

        if(!is_null($this->location)){
            $this->validate([
                'location'=> ['required', 'string','min:3'],
            ]);
            $data['location'] = $this->location;
        }

        if(!is_null($this->logo)){
            $this->validate([
                'logo'=> ['required', 'image','max:5120'],
            ]);
            $imageName = time() . '_' . $this->logo->getClientOriginalName();
            $this->logo->storeAs('images/company_logo', $imageName, 'public');
            $imagePath = 'storage/images/company_logo/' . $imageName;
            $data['image'] = $imagePath;
        }

        if(!empty($data)){
            $company->update($data);
        }

    }

    public function render()
    {
        $numJobs = Job::where('user_id', Auth::user()->id)->count();
        $companyImg = Auth::user()->company_id != '' ? Auth::user()->company->image : '';
        return view('livewire.profile-page', compact(['numJobs', 'companyImg']));
    }
}
