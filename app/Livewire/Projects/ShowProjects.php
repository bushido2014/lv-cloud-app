<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;

class ShowProjects extends Component
{
    public $projects, $title, $description, $image, $projectId;
    public $isEditing = false;

    public function render()
    {
        $this->projects = Project::all();
        return view('livewire.projects.show-projects');
    }

    public function create()
    {
        $this->resetFields();
        $this->isEditing = false;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|string',
        ]);

        Project::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
        ]);

        session()->flash('message', 'Project created successfully.');
        $this->resetFields();
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $this->projectId = $project->id;
        $this->title = $project->title;
        $this->description = $project->description;
        $this->image = $project->image;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|string',
        ]);

        $project = Project::findOrFail($this->projectId);
        $project->update([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
        ]);

        session()->flash('message', 'Project updated successfully.');
        $this->resetFields();
    }

    public function delete($id)
    {
        Project::findOrFail($id)->delete();
        session()->flash('message', 'Project deleted successfully.');
    }

    private function resetFields()
    {
        $this->title = '';
        $this->description = '';
        $this->image = '';
        $this->projectId = null;
        $this->isEditing = false;
    }
}

