<x-ui.container>
    <div class="flex justify-between items-center mt-6">
        <h1 class="font-bold text-2xl">My sprints</h1>
        <x-ui.button wire:click="$dispatch('open-create')">New sprint</x-ui.button>
    </div>

    <livewire:sprint.table />
    <livewire:sprint.create />
</x-ui.container>
