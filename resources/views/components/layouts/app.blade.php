<x-layouts.app.header>
    <flux:main>
        {{ $slot }}
        <flux:toast position="bottom right" class="pb-24" />
    </flux:main>
</x-layouts.app.header>
