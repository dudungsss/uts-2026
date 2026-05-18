<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page', [
            'featuredProjects' => Project::where('is_featured', true)->latest()->take(3)->get(),
            'totalProjects'    => Project::count(),
        ]);
    }
}