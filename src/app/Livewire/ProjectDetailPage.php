<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class ProjectDetailPage extends Component
{
    public Project $project;
    public $report;

    public function mount(string $slug): void
    {
        $this->project = Project::where('slug', $slug)->firstOrFail();
        $this->report  = $this->project->report;
    }

    public function render()
    {
        return view('livewire.project-detail-page', [
            'project' => $this->project,
            'report'  => $this->report,
        ]);
    }
}