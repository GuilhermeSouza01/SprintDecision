<?php

namespace App\Livewire\Sprint;

use App\Models\Room;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Show extends Component
{
    public Room $room;

    public function mount(Room $room): void
    {
        $this->room = $room;
    }

    #[Computed]
    public function tasks(): Collection
    {
        return $this->room->tasks()->latest()->get();
    }

    #[Computed]
    public function participants(): Collection
    {
        return $this->room->participants()->with('user')->get();
    }

    public function pickRandom(): void
    {
        $tasks = $this->room->tasks;
        if ($tasks->isEmpty()) {
            return;
        }
        $this->room->tasks()->update(['selected' => false]);
        $randomTask = $tasks->random();
        $randomTask->update(['selected' => true]);
    }

    public function selectTask(Task $task): void
    {
        $this->room->tasks()->update(['selected' => false]);
        $task->update(['selected' => true]);
    }

    public function closeRoom(): void
    {
        $this->room->update(['status' => 'closed']);
    }

    public function render(): View
    {
        return view('livewire.sprint.show');
    }
}