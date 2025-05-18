<div>
    @if($showModal)
        <div class="fixed inset-0 flex items-center justify-center z-[9999] ">
            <div class="bg-red-600 text-white rounded-lg p-6 w-full max-w-md shadow-lg text-center">
                <h2 class="text-xl font-bold mb-2">Are you sure?</h2>
                <p class="mb-4">This action cannot be undone.</p>
                <div class="flex justify-center space-x-4">
                    <button wire:click="delete({{$jobId}})"
                        class="bg-white text-red-600 px-4 py-2 rounded cursor-pointer font-semibold hover:bg-gray-200">
                        Yes, Delete
                    </button>
                    <button wire:click="$set('showModal', false)"
                        class="bg-gray-300 text-black px-4 py-2 rounded cursor-pointer font-semibold hover:bg-gray-400">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>