<?php

use Livewire\Volt\Component;
use App\Models\Job;

new class extends Component {

    public $xyValues = [];
    public $xValues = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
    public $yValues = [];

    public function mount()
    {
        $jobs = Job::all();

        foreach ($jobs as $job) {
            $day = (int) $job->created_at->format('w');

            switch ($day) {
                case 0:
                    $this->yValues['sunday'] = ($this->yValues['sunday'] ?? 0) + 1;
                    break;
                case 1:
                    $this->yValues['monday'] = ($this->yValues['monday'] ?? 0) + 1;
                    break;
                case 2:
                    $this->yValues['tuesday'] = ($this->yValues['tuesday'] ?? 0) + 1;
                    break;
                case 3:
                    $this->yValues['wednesday'] = ($this->yValues['wednesday'] ?? 0) + 1;
                    break;
                case 4:
                    $this->yValues['thursday'] = ($this->yValues['thursday'] ?? 0) + 1;
                    break;
                case 5:
                    $this->yValues['friday'] = ($this->yValues['friday'] ?? 0) + 1;
                    break;
                case 6:
                    $this->yValues['saturday'] = ($this->yValues['saturday'] ?? 0) + 1;
                    break;
            }
        }
        foreach ($this->xValues as $day) {
            $count = $this->yValues[$day] ?? 0;
            $this->xyValues[] = [
                'x' => ucfirst($day),
                'y' => $count
            ];
        }
    }
}; ?>

<div class="rounded-lg shadow-lg px-4 py-2 bg-white">
    <canvas id="jobChart" ></canvas>

    <script>

        new Chart("jobChart", {
            type: "line",
            data: {
                datasets: [{
                    label: 'Jobs Posted',
                    pointRadius: 4,
                    pointBackgroundColor: "rgba(0,200,0,1)",
                    borderColor: 'rgba(0,200,0,1)',
                    data: @json($xyValues),
                    pointStyle: 'circle',
                    pointRadius: 10,
                    pointHoverRadius: 15,
                }
                ],
            },
        });
    </script>
</div>