<?php

use Livewire\Volt\Component;
use App\Models\ApplyJob;

new class extends Component {

    public $xyValues = [];
    public $xValues = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
    public $yValues = [];
    public $appliedValues = [];
    public $interviewValues = [];
    public $acceptedValues = [];
    public $rejectedValues = [];

    public function incrementDayCount(&$array, $date)
    {
        $dayIndex = (int) $date->format('w');
        $dayName = $this->xValues[$dayIndex];
        $array[$dayName] = ($array[$dayName] ?? 0) + 1;
    }

    public function mount()
    {
        $jobs = ApplyJob::all();

        foreach ($jobs as $job) {
            $this->incrementDayCount($this->yValues, $job->created_at);
        }
        foreach ($this->xValues as $day) {
            $this->xyValues[] = ['x' => ucfirst($day), 'y' => $this->yValues[$day] ?? 0];
        }

        $this->yValues = array_fill_keys($this->xValues, 0);
        foreach ($jobs as $job) {
            if ($job->status == 'applied') {
                $this->incrementDayCount($this->yValues, $job->updated_at);
            }
        }
        foreach ($this->xValues as $day) {
            $this->appliedValues[] = ['x' => ucfirst($day), 'y' => $this->yValues[$day] ?? 0];
        }

        $this->yValues = array_fill_keys($this->xValues, 0);
        foreach ($jobs as $job) {
            if ($job->status == 'interview') {
                $this->incrementDayCount($this->yValues, $job->updated_at);
            }
        }
        foreach ($this->xValues as $day) {
            $this->interviewValues[] = ['x' => ucfirst($day), 'y' => $this->yValues[$day] ?? 0];
        }

        $this->yValues = array_fill_keys($this->xValues, 0);
        foreach ($jobs as $job) {
            if ($job->status == 'accepted') {
                $this->incrementDayCount($this->yValues, $job->updated_at);
            }
        }
        foreach ($this->xValues as $day) {
            $this->acceptedValues[] = ['x' => ucfirst($day), 'y' => $this->yValues[$day] ?? 0];
        }

        $this->yValues = array_fill_keys($this->xValues, 0);
        foreach ($jobs as $job) {
            if ($job->status == 'rejected') {
                $this->incrementDayCount($this->yValues, $job->updated_at);
            }
        }
        foreach ($this->xValues as $day) {
            $this->rejectedValues[] = ['x' => ucfirst($day), 'y' => $this->yValues[$day] ?? 0];
        }
    }
};
?>


<div class="rounded-lg shadow-lg px-4 py-2 bg-white">
    <canvas id="applicationChart"></canvas>

    <script>
        new Chart("applicationChart", {
            type: "line",
            data: {
                datasets: [{
                    label: 'Apllications Posted',
                    pointRadius: 4,
                    pointBackgroundColor: "#000",
                    borderColor: 'rgb(0, 0, 0)',
                    data: @json($xyValues),
                    pointStyle: 'circle',
                    pointRadius: 10,
                    pointHoverRadius: 15,
                },
                {
                    label: 'Apllied Jobs',
                    pointRadius: 4,
                    pointBackgroundColor: "#12d8db",
                    borderColor: '#12d8db',
                    data: @json($appliedValues),
                    pointStyle: 'circle',
                    pointRadius: 10,
                    pointHoverRadius: 15,
                },
                {
                    label: 'Interview',
                    pointRadius: 4,
                    pointBackgroundColor: "#dbc712",
                    borderColor: '#dbc712',
                    data: @json($interviewValues),
                    pointStyle: 'circle',
                    pointRadius: 10,
                    pointHoverRadius: 15,
                },
                {
                    label: 'Accepted',
                    pointRadius: 4,
                    pointBackgroundColor: "#12db18",
                    borderColor: '#12db18',
                    data: @json($acceptedValues),
                    pointStyle: 'circle',
                    pointRadius: 10,
                    pointHoverRadius: 15,
                },
                {
                    label: 'Rejected',
                    pointRadius: 4,
                    pointBackgroundColor: "#db2212",
                    borderColor: '#db2212',
                    data: @json($rejectedValues),
                    pointStyle: 'circle',
                    pointRadius: 10,
                    pointHoverRadius: 15,
                }
                ],
            },
        });
    </script>
</div>