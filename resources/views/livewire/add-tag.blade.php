<div>
    @if($showModal)
        <div class="fixed inset-0 flex items-center justify-center z-[9999]">
            <div class="bg-gray-100 text-white rounded-lg p-6 w-full max-w-md shadow-lg text-center">
                <h2 class="text-xl font-bold mb-2 text-gray-800">Add New Tag</h2>
                <form wire:submit.prevent="addTag" class="flex flex-col space-y-4">
                    <x-form.input-field class="border-white/30 !placeholder-white !text-white" wire:model="name"
                        placeholder="Tag Name" />

                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    @if($errorMessage)
                        <span class="text-red-500 text-sm">{{ $errorMessage }}</span>
                    @endif

                    <div class="flex justify-center space-x-4">
                        <button type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded font-semibold hover:bg-green-600">Save</button>
                        <button type="button" wire:click="closeModal"
                            class="bg-gray-300 text-black px-4 py-2 rounded font-semibold hover:bg-gray-400">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>