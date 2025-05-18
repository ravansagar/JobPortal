<?php

namespace App\Livewire;

use App\Models\Job;
use App\Models\Tag;
use App\Models\Company;
use Livewire\Component;

class BasicInfo extends Component
{
    public $job;
    public $tag;
    public $companies;

    public $showTags = false;
    public $showCompany = false;


    public function showTagList(){

        $this->showTags = !$this->showTags;
        if($this->showTags){
            $this->dispatch('openTags');
        }
        else{
            $this->dispatch('closeTags');
        }
    }


    public function showCompanyList(){
        $this->showCompany = !$this->showCompany;
        if($this->showCompany){
            $this->dispatch('openCompany');
        }
        else{
            $this->dispatch('closeCompany');
        }
    }
   

    public function mount(){
        $this->job = Job::count();
        $this->tag = Tag::count();
        $this->companies = Company::count();
    }
    public function render()
    {
        return view('livewire.basic-info');
    }
}
