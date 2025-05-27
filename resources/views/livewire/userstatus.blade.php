<?php

use Livewire\Volt\Component;
use App\Models\User;
use Carbon\Carbon;

new class extends Component {

    public $xyUValues = [];
    public $xyAValues = [];
    public $xValues = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
    public $yUValues = [];
    public $yAValues = [];

    public function mount()
    {
        $users = User::where('role', '!=', 'admin')->get();

        foreach ($users as $user) {
            $day = (int) $user->created_at->format('w');

            switch ($day) {
                case 0:
                    $this->yUValues['sunday'] = ($this->yUValues['sunday'] ?? 0) + 1;
                    break;
                case 1:
                    $this->yUValues['monday'] = ($this->yUValues['monday'] ?? 0) + 1;
                    break;
                case 2:
                    $this->yUValues['tuesday'] = ($this->yUValues['tuesday'] ?? 0) + 1;
                    break;
                case 3:
                    $this->yUValues['wednesday'] = ($this->yUValues['wednesday'] ?? 0) + 1;
                    break;
                case 4:
                    $this->yUValues['thursday'] = ($this->yUValues['thursday'] ?? 0) + 1;
                    break;
                case 5:
                    $this->yUValues['friday'] = ($this->yUValues['friday'] ?? 0) + 1;
                    break;
                case 6:
                    $this->yUValues['saturday'] = ($this->yUValues['saturday'] ?? 0) + 1;
                    break;
            }
        }
        foreach ($this->xValues as $day) {
            $count = $this->yUValues[$day] ?? 0;
            $this->xyUValues[] = [
                'x' => ucfirst($day),
                'y' => $count
            ];
        }

        $users = User::where('role',  'agent')->get();

        foreach ($users as $user) {
            $day = (int) $user->created_at->format('w');

            switch ($day) {
                case 0:
                    $this->yAValues['sunday'] = ($this->yAValues['sunday'] ?? 0) + 1;
                    break;
                case 1:
                    $this->yAValues['monday'] = ($this->yAValues['monday'] ?? 0) + 1;
                    break;
                case 2:
                    $this->yAValues['tuesday'] = ($this->yAValues['tuesday'] ?? 0) + 1;
                    break;
                case 3:
                    $this->yAValues['wednesday'] = ($this->yAValues['wednesday'] ?? 0) + 1;
                    break;
                case 4:
                    $this->yAValues['thursday'] = ($this->yAValues['thursday'] ?? 0) + 1;
                    break;
                case 5:
                    $this->yAValues['friday'] = ($this->yAValues['friday'] ?? 0) + 1;
                    break;
                case 6:
                    $this->yAValues['saturday'] = ($this->yAValues['saturday'] ?? 0) + 1;
                    break;
            }
        }
        foreach ($this->xValues as $day) {
            $count = $this->yAValues[$day] ?? 0;
            $this->xyAValues[] = [
                'x' => ucfirst($day),
                'y' => $count
            ];
        }
    }
}; ?>

<div class="rounded-lg shadow-lg px-4 py-2 bg-white">
    <canvas id="userChart" ></canvas>

    <script>

        new Chart("userChart", {
            type: "line",
            data: {
                datasets: [{
                    label: 'Users Created',
                    pointRadius: 4,
                    pointBackgroundColor: "rgba(0,0,255,1)",
                    data: @json($xyUValues),
                    pointStyle: 'circle',
                    pointRadius: 10,
                    pointHoverRadius: 15,
                }, 
                {
                    label: 'Agents Created',
                    pointRadius: 4,
                    pointBackgroundColor: "rgba(255,0,0,1)",
                    data: @json($xyAValues),
                    pointStyle: 'rect',
                    pointRadius: 10,
                    pointHoverRadius: 15,
                }],
            },
        });
    </script>
</div>