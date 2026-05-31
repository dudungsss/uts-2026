<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Profile;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class HomePage extends Component
{
    public function render()
    {
        $profile = Profile::active();
        $typingTexts = array_map('trim', explode(',', $profile?->typing_texts ?? 'Mahasiswa Esa Unggul,Fullstack Learner,Vibe Coder'));
        
        // Ensure tech_stacks is array/collection
        if ($profile && is_string($profile->tech_stacks)) {
            $profile->tech_stacks = json_decode($profile->tech_stacks, true);
        }

        return view('livewire.home-page', [
            'profile' => $profile,
            'typingTexts' => $typingTexts,
            'featuredProjects' => Project::where('is_featured', true)->latest()->take(1)->get(),
            'totalProjects' => Project::count(),
        ]);
    }
}