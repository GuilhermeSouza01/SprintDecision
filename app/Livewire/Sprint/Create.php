<?php

namespace App\Livewire\Sprint;

use App\Models\Room;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public bool $open = false;
    public string $name = '';

    #[On('open-create')]
    public function openModal(): void
    {
        $this->open = true;
    }

    public function create(): void
    {
        $this->validate(['name' => 'required|min:3|max:100']);

        Room::create([
            'user_id' => auth()->id(),
            'name' => $this->name,
            'code' => 'DEV' . strtoupper(Str::random(3)),
            'status' => 'open',
        ]);
        $this->reset(['name', 'open']);
        $this->dispatch('room-created');
    }

    public function render()
    {
        return view('livewire.sprint.create');
    }
}
