@if (session('message'))
    <div class="w-full bg-green-400 p-3 my-3">
        {{ session('message') }}
    </div>
@endif

@if (session('error'))
    <div class="w-full bg-red-400 p-3">
        {{ session('error') }}
    </div>
@endif