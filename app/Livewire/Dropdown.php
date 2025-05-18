<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tag;
use App\Models\Company;
use Livewire\Attributes\On;

class Dropdown extends Component
{
    // protected $listeners = ["openTags" => "showTags", "closeTags" => "hideTags", "openCompany" => "showCompany", "closeCompany" => "hideCompany"];

    public $showTags = false;
    public $showCompany = false;

    public function filterByTag($tag){
        $this->dispatch('filterByTag', $tag);
    }

    public function filterByCompany($company){
        $this->dispatch('filterByCompany', $company);
    }

    #[On('openTags')]
    public function showTags(){
        if($this->showCompany){
            $this->showCompany = false;
            $this->dispatch('closeCompany');
        } 
        $this->showTags =  true;
    }

    #[On('closeTags')]
    public function hideTags(){
        $this->showTags = false;
        $this->dispatch('clearFilters');
    }

    #[On('openCompany')]
    public function showCompany(){
        if($this->showTags){
            $this->showTags = false;
            $this->dispatch('closeTags');
        } 
        $this->showCompany = true;
    }

    #[On('closeCompany')]
    public function hideCompany(){
        $this->showCompany = false;
        $this->dispatch('clearFilters');
    }

    public $tags, $companies;

    public function mount(){
        $this->tags = Tag::all();
        $this->companies = Company::all();
    }
    public function render()
    {
        return view('livewire.dropdown');
    }
}
