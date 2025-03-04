<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ShowProjects extends Component
{
    use WithFileUploads;

    public $title, $description, $image, $projectId;
    public $isEditing = false;

    public function render()
    {
        return view('livewire.projects.show-projects', [
            'projects' => Project::all(),
        ]);
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
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $this->image ? $this->image->store('projects', 'public') : null;

        Project::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $imagePath,
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
        $this->image = null;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $project = Project::findOrFail($this->projectId);

        if ($this->image) {
            // Șterge imaginea veche dacă există
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $imagePath = $this->image->store('projects', 'public');
        } else {
            $imagePath = $project->image;
        }

        $project->update([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $imagePath,
        ]);

        session()->flash('message', 'Project updated successfully.');
        $this->resetFields();
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);

        // Șterge imaginea asociată dacă există
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();
        session()->flash('message', 'Project deleted successfully.');
    }

    private function resetFields()
    {
        $this->title = '';
        $this->description = '';
        $this->image = null;
        $this->projectId = null;
        $this->isEditing = false;
    }
}
