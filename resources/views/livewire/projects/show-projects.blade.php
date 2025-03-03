<div class="container mx-auto p-4">
     <flux:heading size="xl" class="mb-1">Projects</flux:heading>

    <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}" enctype="multipart/form-data">
    <flux:field>
       <flux:label>Title</flux:label>
        <flux:input type="text" wire:model="title" placeholder="Title"/>
    </flux:field>
    <flux:field>
        <flux:textarea label="Description" wire:model="description" placeholder="Description" rows="3" />
        </flux:field>
        <flux:field>
        <flux:input type="file" wire:model="image" label="Upload Image"/>     
        </flux:field>

        <!-- Previzualizare imagine înainte de upload -->
        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" class="mt-2 w-full rounded">
        @elseif ($isEditing && $projectId)
            <img src="{{ asset('storage/' . \App\Models\Project::find($projectId)->image) }}" class="mt-2 w-full rounded">
        @endif

        <!-- <button type="submit" class="bg-blue-500 text-white p-2 mt-2">
            {{ $isEditing ? 'Update' : 'Create' }}
        </button> -->
        <flux:field>
        <flux:button variant="primary" type="submit"> {{ $isEditing ? 'Update' : 'Create' }}</flux:button>
        </flux:field>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
        @foreach ($projects as $project)
            <div class="bg-white shadow-md p-4 rounded-lg">
                <h2 class="text-lg font-semibold">{{ $project->title }}</h2>
                <p class="text-gray-600">{{ $project->description }}</p>

                <!-- Afișare imagine salvată -->
                @if ($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" class="mt-2 w-full rounded">
                @endif
                <flux:button variant="filled" wire:click="edit({{ $project->id }})">Edit</flux:button>
                <flux:button variant="danger" wire:click="delete({{ $project->id }})">Delete</flux:button>
            </div>
        @endforeach
    </div>

</div>
