<?php

use App\Models\Job;
use App\Models\ApplyJob;
use Livewire\Volt\Component;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Support\HtmlString;

new class extends Component {
    use WithPagination;

    public ?int $quantity = 10;

    public ?string $search = "";

    public function showConfirmModal($jobId)
    {
        $this->dispatch('confirmModal', $jobId);
    }

    #[On('updateSearch')]
    public function updateSearch($char)
    {
        $this->search = $char;
    }

    public array $sort = [
        'column' => 'id',
        'direction' => 'asc',
    ];


    protected function getActionButtons($job): string
    {
        $viewRoute = route('jobs.view', $job->id);
        $editRoute = route('jobs.update', $job->id);


        return sprintf('
            <div class="flex justify-end space-x-1 px-8">
                <a href="%s" 
                class="p-1 text-blue-600 hover:text-blue-900 rounded-full hover:bg-blue-50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </a>
                <a href="%s" 
                class="p-1 text-green-600 hover:text-green-900 rounded-full hover:bg-green-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </a>
                <button wire:click="showConfirmModal(%d)" 
                        class="p-1 text-red-600 hover:text-red-900 rounded-full hover:bg-red-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </div>', $viewRoute, $editRoute, $job->id);
    }

    public function changeQuantity($value)
    {
        $this->quantity = (int) $value;
        $this->resetPage();
    }

    public function with(): array
    {
        $jobs = Job::query()
            ->with('user')
            ->with('company')
            ->with('application')
            ->when($this->search, function (Builder $query) {
                return $query->where('name', 'like', "%{$this->search}%");
            })
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();

        $headers = [
            ['index' => 'id', 'label' => 'Id'],
            ['index' => 'name', 'label' => 'Title'],
            ['index' => 'salary', 'label' => 'Salary', 'sortable' => false],
            ['index' => 'posted_by', 'label' => 'Posted By'],
            ['index' => 'company', 'label' => 'Company'],
            ['index' => 'application', 'label' => 'Total Applications'],
            ['index' => 'actions', 'label' => 'Actions', 'sortable' => false, 'html' => true]
        ];

        return [
            'headers' => $headers,
            'rows' => $jobs->through(function ($job) {
                return [
                    'id' => $job->id,
                    'name' => $job->name,
                    'salary' => $job->salary,
                    'posted_by' => $job->user->name ?? 'N/A',
                    'company' => $job->user->company->name ?? 'N/A',
                    'application' => ApplyJob::where('job_id', $job->id)->count(),
                    'actions' => new HtmlString($this->getActionButtons($job))
                ];
            }),
            'sort' => $this->sort,
        ];
    }
};

?>

<div class="justify-center px-4">
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => { show = false; }, 3000)" x-show="show"
            class="fixed top-15 right-4 z-50 bg-white text-green-600 border border-green-400 rounded mr-15 px-4 py-2 shadow">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="text-red-400 my-2">{{ session('error') }}</div>
    @endif
    
    <div class="flex justify-between items-center mb-4">
        <div>
            <label for="quantity" class="mr-2">Items per page:</label>
            <select wire:change="changeQuantity($event.target.value)" id="quantity" class="border rounded-md ">
                <option value="5">5</option>
                <option value="10" selected>10</option>
                <option value="15">15</option>
            </select>
        </div>
    </div>

    <x-table :headers="$headers" :rows="$rows" :sort="$sort" striped loading paginate persistent />

    @livewire('delete-job')

</div>