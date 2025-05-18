<?php

use App\Models\User;
use App\Models\Job;

use Livewire\Volt\Component;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;
use Livewire\Attributes\On;



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
    public function updateSearch($char)
    {
        $this->search = $char;
    }

    public array $sort = [
        'column' => 'id',
        'direction' => 'asc',
    ];

    public function with(): array
    {
        $users = User::query()
            ->where('role', 'user')
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
                ['index' => 'application', 'label' => 'Total Application'],
            ],
            'rows' => $users->through(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'jobs' => Job::where('user_id', $user->id)->count(),
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

</div>