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

    public $showDel = false;

    public $company;

    #[On('updateSearch')]
    public function updateSearch($char)
    {
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

    public function delete()
    {
        $this->company->delete();
        $this->reset();
    }

    public function confirmDelete($id){
        $this->company = Company::findOrFail($id);
        $this->showDel = true;
    }

    protected function getActionButtons($com): string
    {
        return sprintf('
            <div class="flex justify-start space-x-1">
                <button wire:click="confirmDelete(%d)" 
                        class="p-1 flex text-red-600 hover:text-red-900 rounded-full hover:bg-red-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg> <span class="px-2 font-semibold">Delete</span>
                </button>
            </div>',  $com->id);
    }

    public function mount(){
        $this->resetPage();
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

    <x-table :$headers :$rows :$sort striped loading paginate persistent />

    <div>
        @if($showDel)
            <div class="fixed inset-0 flex items-center justify-center z-[9999] ">
                <div class="bg-red-600 text-white rounded-lg p-6 w-full max-w-md shadow-lg text-center">
                    <h2 class="text-xl font-bold mb-2">Are you sure?</h2>
                    <p class="mb-4">This action cannot be undone.</p>
                    <div class="flex justify-center space-x-4">
                        <button wire:click="delete({{ $company->id }})"
                            class="bg-white text-red-600 px-4 py-2 rounded cursor-pointer font-semibold hover:bg-gray-200">
                            Yes, Delete
                        </button>
                        <button wire:click="$set('showDel', false)"
                            class="bg-gray-300 text-black px-4 py-2 rounded cursor-pointer font-semibold hover:bg-gray-400">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>

</div>