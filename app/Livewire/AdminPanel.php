<?php

/**
 * First time another comp shows on last
 */
namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Layout;

use App\Models\User;
use App\Models\Job;
use App\Models\Tag;
use App\Models\Company;

#[Title("Admin Panel")]
#[Layout("components.layouts.app")]
class AdminPanel extends Component
{
    public $tags, $jobs, $users, $companies;
    public $showJobs = false;
    public $showComp = false;
    public $showTags = false;
    public $showUsers = false;
    public $showAgents = false;
    public $tab;

    public $search = "";

    public function updated(){
        if($this->search == ""){
            $this->dispatch("updateSearch", '');
        }
        if($this->search != ""){
            $this->dispatch("updateSearch", $this->search);
            if($this->search == ""){
                $this->dispatch("updateSearch", '');
            }
        }
    }

    public function logout(){
        $this->dispatch('logout');
    }
    
    public function allUsers(){
        $this->hide();
        $this->showUsers = true;
    }

    public function allAgents(){
        $this->hide();
        $this->users = User::all();
        $this->showAgents = true;
    }

    public function allJobs(){
        $this->hide();
        $this->jobs = Job::all();
        $this->showJobs = true;
    }
    public function allComp(){
        $this->hide();
        $this->companies = Company::all();
        $this->showComp = true;
    }

    public function hide(){
        if($this->showJobs) $this->showJobs = false;
        if($this->showComp) $this->showComp = false;
        if($this->showTags) $this->showTags = false;
        if($this->showUsers) $this->showUsers = false;
        if($this->showAgents) $this->showAgents = false;
    }

    public function allTags(){
        $this->hide();
        $this->tags = Tag::all();
        $this->showTags = true;
    }

    public function mount($tab = null)  {
        $this->tab = $tab;
        if($tab == 'jobs'){
            $this->allJobs();
        } elseif($tab == 'companies') {
            $this->allComp();
        } elseif($tab == 'tags') {
            $this->allTags();
        } elseif($tab == 'users') {
            $this->allUsers();
        } elseif($tab == 'agents') {
            $this->allAgents();
        }
    }
    public function render()
    {
        return view('livewire.admin-panel');
    }
}
