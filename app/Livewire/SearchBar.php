<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBar extends Component
{
    public $search = '';

    public function updatedSearch()
    {
        $this->performSearch();
    }
    public function performSearch()
    {
        $this->dispatch('setSearch', $this->search);
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
