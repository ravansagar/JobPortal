<?php

namespace App\Livewire;

use App\Models\ApplyJob;
use Livewire\Component;
use App\Models\Job;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;

class AppliedJobs extends Component
{
    use WithPagination;
    use WithFileUploads;
    
    public $job_id = null;
    public $jobs = [];
    public $statuses = ['applied', 'interview', 'hired', 'rejected'];
    
    public $showViewModal = false;
    public $showDeleteModal = false;
    public $showStatusModal = false;
    public $currentApplication = null;
    public $newStatus = '';

    public $showPdf;

    public $perPage = 10;
    
    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'job_id' => ['except' => ''],
    ];
    
    public function mount($id = null)
    {
        $this->jobs = Job::where('user_id', auth()->id())->get();
        $this->job_id = $id;
    }
    
    #[On('viewApplication')]
    public function viewApplication($id)
    {
        $this->currentApplication = ApplyJob::with(['user', 'job'])->findOrFail($id);
        $this->showViewModal = true;
    }
    
    #[On('confirmDeleteApplication')]
    public function confirmDeleteApplication($id)
    {
        $this->currentApplication = ApplyJob::findOrFail($id);
        $this->showDeleteModal = true;
    }
    
    public function deleteApplication()
    {
        if ($this->currentApplication) {

            if ($this->currentApplication->resume) {
                Storage::delete($this->currentApplication->resume);
            }
            
            if ($this->currentApplication->cover_letter_path) {
                Storage::delete($this->currentApplication->cover_letter_path);
            }
            
            $this->currentApplication->delete();
            $this->showDeleteModal = false;
            $this->currentApplication = null;
            
            session()->flash('message', 'Application deleted successfully.');
            $this->redirect(url()->previous());
        }
    }
    
    #[On('openStatusModal')]
    public function openStatusModal($id)
    {
        $this->showStatusModal = true;
        $this->currentApplication = ApplyJob::findOrFail($id);
        $this->newStatus = $this->currentApplication->status;
    }

    #[On('hideStatusModel')]
    public function hideStatusModel(){
        $this->showStatusModal = false;
    }
    
    #[On('updateStatus')]
    public function updateStatus($newStatus)
    {
        if ($this->currentApplication) {

            $this->currentApplication->status = $newStatus;
            $this->currentApplication->save();
            $this->showStatusModal = false;
            $this->showViewModal = false;

            $this->currentApplication = $this->currentApplication->fresh();            
            $this->redirect(url()->previous());
            session()->flash('message', 'Application status updated successfully.');

        }
    }
    
    public function getApplicationsProperty()
    {
        return ApplyJob::query()
        ->where('job_id', $this->job_id)
        ->with(['user', 'job'])
        ->latest()
        ->paginate($this->perPage);

    }
    
    public function render()
    {
        $applications = $this->applications;

        return view('livewire.applied-jobs', [
            'applications_data' => $applications->items(),
            'pagination_data' => [
                'total' => $applications->total(),
                'per_page' => $applications->perPage(),
                'current_page' => $applications->currentPage(),
                'last_page' => $applications->lastPage(),
                'path' => $applications->path(),
                'links' => $applications->linkCollection()->toArray(),
            ]
        ]);
    }
}
