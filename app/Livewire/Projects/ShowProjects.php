<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;

class ShowProjects extends Component
{
    public function render()
    {
        $projects = Project::all(); 
        return view('livewire.projects.show-projects', compact('projects'));
    }
}
