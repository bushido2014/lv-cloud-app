<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Projects</h1>

    <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}" enctype="multipart/form-data">
        <input type="text" wire:model="title" placeholder="Title" class="border p-2 w-full">
        <textarea wire:model="description" placeholder="Description" class="border p-2 w-full"></textarea>

        <!-- Input pentru upload imagine -->
        <input type="file" wire:model="image" class="border p-2 w-full">

        <!-- Previzualizare imagine înainte de upload -->
        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" class="mt-2 w-full rounded">
        @elseif ($isEditing && $projectId)
            <img src="{{ asset('storage/' . \App\Models\Project::find($projectId)->image) }}" class="mt-2 w-full rounded">
        @endif

        <button type="submit" class="bg-blue-500 text-white p-2 mt-2">
            {{ $isEditing ? 'Update' : 'Create' }}
        </button>
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

                <button wire:click="edit({{ $project->id }})" class="bg-yellow-500 text-white p-2 mt-2">Edit</button>
                <button wire:click="delete({{ $project->id }})" class="bg-red-500 text-white p-2 mt-2">Delete</button>
            </div>
        @endforeach
    </div>

</div>
