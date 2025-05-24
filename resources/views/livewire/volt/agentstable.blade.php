<?php

use App\Models\User;
use App\Models\Job;

use Livewire\Volt\Component;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Support\HtmlString;


new class extends Component {
    use WithPagination;

    public ?int $quantity = 10; 
 
    public ?string $search = ""; 

    public function changeQuantity($value)
    {
        $this->quantity = (int) $value;
        $this->resetPage();
    }

    #[On('updateSearch')]
    public function updateSearch($char){
        $this->search = $char;
    }

    public array $sort = [ 
        'column' => 'id',
        'direction' => 'asc',
    ];


    protected function getActionButtons($user): string
    {
        $viewRoute = route('profile', $user->id);
        return sprintf('
            <div class="flex justify-start space-x-1">
                <a href="%s" 
                class="p-1 text-blue-600 hover:text-blue-900 rounded-full hover:bg-blue-50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </a>
            </div>', $viewRoute);
    }

    public function mount(){
        $this->resetPage();
    }

    public function with(): array
    {
        $users = User::query()
        ->where('role','agent')
        ->when($this->search, function (Builder $query) {
            return $query->where('name', 'like', "%{$this->search}%");
        })
        ->orderBy(...array_values($this->sort))
        ->paginate($this->quantity)
        ->withQueryString();

        return [
            'headers' => [
                ['index' => 'id', 'label' => 'Id'],
                ['index' => 'name', 'label' => 'Full Name'],
                ['index' => 'email', 'label' => 'Email'],
                ['index' => 'company', 'label' => 'Company'],
                ['index' => 'jobs', 'label' => 'Total Jobs Created'],
                ['index' => 'actions', 'label' => 'Actions', 'sortable' => false, 'html' => true]
            ],
            'rows' => $users->through(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'company' => $user->company?->name,
                'jobs' => Job::where('user_id', $user->id)->count(),
                'actions' => new HtmlString($this->getActionButtons($user))
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
