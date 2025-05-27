<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Job;
use Livewire\WithFileUploads;
use Auth;
use App\Models\Company;
use Illuminate\Support\Facades\URL;
use App\Models\User;

#[Title("Profile Page")]
class ProfilePage extends Component
{
    use WithFileUploads;

    public  $image, $company_id, $name, $location, $logo;    
    
    public $user;
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

    public function mount(){
        $url = URL::previous();
        $path = parse_url($url, PHP_URL_PATH);
        if($path == '/admin'){
            $this->route = $path;
            $fullUrl = explode('?', url()->full());
            $id = explode("=", $fullUrl[1])[0];
            $this->user = User::findOrFail($id);
            if(is_null($this->user)){
                return abort(404, 'User Not Found');
            }
        } else {
            $this->user = Auth::user();
        }

    }

    public function updateCompany($logo = null){

        $company = $this->user()->company;

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
        $numJobs = Job::where('user_id', $this->user->id)->count();
        $companyImg = $this->user->company_id != '' ? $this->user->company->image : '';
        return view('livewire.profile-page',compact(['numJobs','companyImg']));
    }
}
