<?php

use Livewire\Volt\Component;
use App\Models\User;
use App\Models\Job;
use App\Models\ApplyJob;

new class extends Component {
    public $chartData;
    
    public function mount()
    {
        $agents = User::with(['jobs', 'jobs.application'])
                    ->where('role', 'agent')->get();
        
        $agentNames = [];
        $jobsPosted = [];
        $hiredCount = [];
        $rejectedCount = [];
        $interviewCount = [];
        
        foreach ($agents as $agent) {
            $agentNames[] = $agent->name;
            $jobsPosted[] = $agent->jobs->count();
            
            $applied = 0;
            $hired = 0;
            $rejected = 0;
            $interview = 0;
            
            
            foreach ($agent->jobs as $job) {
                $status = ApplyJob::where('job_id', $job->id)->get('status');
                foreach ($status as $application) {
                    switch ($application->status) {
                        case 'applied':
                            $applied++;
                            break;
                        case 'hired':
                            $hired++;
                            break;
                        case 'rejected':
                            $rejected++;
                            break;
                        case 'interview':
                            $interview++;
                            break;
                    }
                }
                
            }
            $appliedCount[] = $applied;
            $hiredCount[] = $hired;
            $rejectedCount[] = $rejected;
            $interviewCount[] = $interview;
        }
        
        $this->chartData = [
            'labels' => $agentNames,
            'datasets' => [
                [
                    'label' => 'Jobs Posted',
                    'data' => $jobsPosted,
                    'backgroundColor' => '#3B82F6',
                ],
                [
                    'label' => 'Applied',
                    'data' => $appliedCount,
                    'backgroundColor' => '#F87171',
                ],
                [
                    'label' => 'Interview',
                    'data' => $interviewCount,
                    'backgroundColor' => '#F59E0B',
                ],
                [
                    'label' => 'Hired',
                    'data' => $hiredCount,
                    'backgroundColor' => '#10B981',
                ],
                [
                    'label' => 'Rejected',
                    'data' => $rejectedCount,
                    'backgroundColor' => '#EF4444',
                ]
            ]
        ];
    }
}; ?>

<div x-data="{
    initChart() {
        const ctx = this.$refs.chart;
        const chartData = @js($chartData);
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.labels,
                datasets: chartData.datasets
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Agent Performance Overview',
                        font: { size: 16 }
                    },
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    x: {
                        stacked: false,
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        stacked: false,
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                interaction: {
                    mode: 'index'
                }
            }
        });
    }
}" x-init="initChart()" wire:ignore>
    <canvas x-ref="chart" height="300"></canvas>
</div>