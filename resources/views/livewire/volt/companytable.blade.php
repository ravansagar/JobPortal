<?php

use App\Models\Company;
use App\Models\Job;
use App\Models\User;

use Livewire\Volt\Component;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Support\HtmlString;


new class extends Component {
    use WithPagination;

    public ?int $quantity = 10; 
 
    public ?string $search = ""; 


    #[On('updateSearch')]
    public function updateSearch($char){
        $this->search = $char;
    }

    public array $sort = [ 
        'column' => 'id',
        'direction' => 'asc',
    ];

    public function changeQuantity($value)
    {
        $this->quantity = (int) $value;
        $this->resetPage();
    }

    protected function getActionButtons($com): string
    {
        $viewRoute = route('jobs.view', $com->id);
        $editRoute = route('jobs.update', $com->id);


        return sprintf('
            <div class="flex justify-end space-x-1 px-8">
                <a href="%s" 
                class="p-1 text-blue-600 hover:text-blue-900 rounded-full hover:bg-blue-50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </a>

                <button wire:click="showConfirmModal(%d)" 
                        class="p-1 text-red-600 hover:text-red-900 rounded-full hover:bg-red-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </div>', $viewRoute, $com->id);
    }

    public function with(): array
    {
        $company = Company::query()
        ->when($this->search, function (Builder $query) {
            return $query->where('name', 'like', "%{$this->search}%");
        })
        ->orderBy(...array_values($this->sort))
        ->paginate($this->quantity)
        ->withQueryString();

        return [
            'headers' => [
                ['index' => 'id', 'label' => 'Id'],
                ['index' => 'name', 'label' => 'Company Name'],
                ['index' => 'location', 'label' => 'Company Location', 'sortable' => false],
                ['index' => 'jobs', 'label' => 'Total Jobs Posted'],
                ['index' => 'actions', 'label' => 'Actions', 'sortable' => false, 'html' => true]
            ],
            'rows' => $company->through(function ($com) {
            return [
                'id' => $com->id,
                'name' => $com->name,
                'location' => $com->location ?? 'N/A',
                'jobs' => Job::whereIn('user_id', User::where('company_id', $com->id)->pluck('id'))->count(),
                'actions' => new HtmlString($this->getActionButtons($com))
            ];
        }),
        ];
    } 
};

?>

<div class="justify-center px-4">

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

    <x-table :$headers :$rows :$sort striped loading paginate persistent  />
        
</div>
