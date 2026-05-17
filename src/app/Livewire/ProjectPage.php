<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectPage extends Component
{
    public string $filter = 'all';

    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $query = Project::latest();

        if ($this->filter !== 'all') {
            $query->where('status', $this->filter);
        }

        return view('livewire.project-page', [
            'projects' => $query->get(),
        ]);
    }
}