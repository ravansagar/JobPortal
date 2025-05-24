<?php
namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Job;
use App\Models\User;
use App\Models\Tag;
use App\Models\Company;
use Route;
use Auth;

class JobList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 8;
    public $selectedTagId = null;
    public $selectedCompanyId = null;
    public $isAgentPage;
    public $i = 1;
    public $currentUrl = "";
    protected $paginationTheme = 'tailwind';

    protected $listeners = [
        'setSearch' => 'setSearch',
    ];

    public function setSearch($value)
    {
        $this->search = $value;
        $this->resetPage();
    }

    #[On('filterByTag')]
    public function filterByTag(Tag $tag)
    {
        $this->selectedTagId = $tag->id;
        $this->resetPage();
    }

    #[On('filterByCompany')]
    public function filterByCompany(Company $company)
    {
        $this->selectedCompanyId = $company->id;
        $this->resetPage();
    }

    #[On('clearFilters')]
    public function clearFilters()
    {
        $this->selectedTagId = null;
        $this->selectedCompanyId = null;
        $this->resetPage();
    }

    public function mount($isAgentPage = false)
    {
        $this->isAgentPage = $isAgentPage;
        $this->currentUrl = url()->current();
    }
    public function getJobs()
    {
        $query = Job::with(['tag', 'user.company']);
        $currentRoute = Route::getCurrentRoute();

        if ($currentRoute && $currentRoute->uri === 'myjobs') {
            $query->where('user_id', Auth::id());
        }

        if ($this->search !== '') {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhereHas('tag', function ($tagQuery) {
                        $tagQuery->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        }

        if ($this->selectedTagId !== null) {
            $query->where('tag_id', $this->selectedTagId);
        }

        if ($this->selectedCompanyId !== null) {
            $userIds = User::where('company_id', $this->selectedCompanyId)->pluck('id');
            $query->whereIn('user_id', $userIds);
        }

        $query->orderBy('created_at', 'desc');

        return $query->paginate($this->perPage);
    }

    public function render()
    {
        $jobs = $this->getJobs();
        $currentUrl = $this->currentUrl;
        return view('livewire.job-list', compact('jobs', 'currentUrl'));
    }
}
