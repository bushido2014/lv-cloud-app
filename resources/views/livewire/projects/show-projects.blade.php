<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Projects</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        {{-- @foreach ($projects as $project)
            <div class="bg-white shadow-md p-4 rounded-lg">
                <h2 class="text-lg font-semibold">{{ $project->title }}</h2>
                <p class="text-gray-600">{{ $project->description }}</p>
                @if ($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" class="mt-2 w-full rounded">
                @endif
            </div>
        @endforeach --}}
    </div>
</div>
