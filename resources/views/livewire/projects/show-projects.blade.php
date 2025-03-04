<div class="container mx-auto p-4">
     <flux:heading size="xl" class="mb-1">Projects</flux:heading>
    <x-message></x-message>
    <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}" enctype="multipart/form-data">
    <div class="space-y-6">     
    <flux:field>
       
        <flux:input label="Add Title" type="text" wire:model="title" placeholder="Title"/>
    </flux:field>
    <flux:field>
        <flux:textarea label="Add Description" wire:model="description" placeholder="Description" rows="3" />
        </flux:field>
        <flux:field>
        <flux:input type="file" wire:model="image" label="Upload Image"  />     
        </flux:field>

        <!-- Previzualizare imagine înainte de upload -->
        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" class="mt-2 w-64 h-64 object-cover rounded">
        @elseif ($isEditing && $projectId)
            <img src="{{ asset('storage/' . \App\Models\Project::find($projectId)->image) }}" class="mt-2 object-cover w-64 h-64 rounded">
        @endif
        
        <flux:button variant="primary" type="submit"> {{ $isEditing ? 'Update' : 'Create' }}</flux:button>
         </div>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
        @foreach ($projects as $project)
        <div class="p-6 rounded-xl bg-white dark:bg-white/10 border border-zinc-200 dark:border-white/10 space-y-6">
            <flux:heading size="lg">   
               {{ $project->title }}
                </flux:heading>
                <flux:subheading class="mb-4">
                <p class="text-gray-600">{{ $project->description }}</p>
                </flux:subheading>
                <!-- Afișare imagine salvată -->
                @if ($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" class="mt-2 w-full rounded">
                @endif
                <div class="flex gap-4 pt-2">
                <flux:button  wire:click="edit({{ $project->id }})">Edit</flux:button>

                <!-- <flux:button variant="danger" 
                wire:confirm="Are you sure you want to delete this project?"
                wire:click="delete({{ $project->id }})">Delete</flux:button> -->

                <flux:button  wire:click="edit({{ $project->id }})">Edit</flux:button>
               
                <flux:button variant="danger"
    @dispatch('openModal', name: 'confirmDelete', projectId: {{ $project->id }})>
    Delete
</flux:button>
    </div>
        @endforeach
    </div>

    <flux:modal name="confirmDelete">
    <div class="p-6">
        <h2 class="text-lg font-semibold">Confirm Deletion</h2>
        <p>Are you sure you want to delete this project?</p>
        <div class="mt-4 flex justify-end">
        <flux:button @dispatch('deleteProject', projectId: {{ $project->id }})" variant="danger">
    Delete
</flux:button>
            <flux:button modal-close class="ml-2 px-4 py-2">Cancel</flux:button>
        </div>
    </div>
</flux:modal>

</div>

