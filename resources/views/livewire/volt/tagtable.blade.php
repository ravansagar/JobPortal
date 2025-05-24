<?php

use App\Models\Tag;
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
    public ?int $editingId = null;
    public string $editingName = '';

    public array $sort = [ 
        'column' => 'id',
        'direction' => 'asc',
    ];

    public function changeQuantity($value)
    {
        $this->quantity = (int) $value;
        $this->resetPage();
    }

    #[On('updateSearch')]
    public function updateSearch($char){
        $this->search = $char;
    }

    public function delete($id) {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        $this->reset();
    }

    public function edit($id, $name)
    {
        $this->editingId = $id;
        $this->editingName = $name;
    }

    public function save()
    {
        $this->validate([
            'editingName' => 'required|string|max:255'
        ]);

        Tag::find($this->editingId)->update([
            'name' => $this->editingName
        ]);

        $this->cancel();
    }

    public function cancel()
    {
        $this->editingId = null;
        $this->editingName = '';
    }

    protected function getActionButtons($tag): string
    {
        return sprintf('
            <div class="flex justify-start space-x-1">
                <button wire:click="edit(%d, \'%s\')" 
                        class="p-1 text-green-600 hover:text-green-900 rounded-full hover:bg-green-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </button>

                <button wire:click="delete(%d)" 
                        class="p-1 text-red-600 hover:text-red-900 rounded-full hover:bg-red-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </div>', $tag->id, addslashes($tag->name), $tag->id);
    }

    public function mount(){
        $this->resetPage();
    }

    public function with(): array
    {
        $tags = Tag::query()
            ->when($this->search, function (Builder $query) {
                return $query->where('name', 'like', "%{$this->search}%");
            })
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();

        return [
            'headers' => [
                ['index' => 'id', 'label' => 'Id'],
                ['index' => 'name', 'label' => 'Tag Name'],
                ['index' => 'jobs', 'label' => 'Total Jobs'],
                ['index' => 'actions', 'label' => 'Actions', 'sortable' => false, 'html' => true]
            ],
            'rows' => $tags->through(function ($tag) {
                return [
                    'id' => $tag->id,
                    'name' => $this->editingId === $tag->id 
                        ? new HtmlString('
                            <div class="flex items-center space-x-2">
                                <input wire:model="editingName" 
                                       class="border rounded px-2 py-1 w-full"
                                       wire:keydown.enter="save"
                                       wire:keydown.escape="cancel">
                                <button wire:click="save" class="text-green-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </button>
                                <button wire:click="cancel" class="text-red-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        ')
                        : $tag->name,
                    'jobs' => Job::where('tag_id', $tag->id)->count(),
                    'actions' => new HtmlString($this->getActionButtons($tag))
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
