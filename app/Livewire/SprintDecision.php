<?php

namespace App\Livewire;

use App\Models\Participant;
use App\Models\Room;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SprintDecision extends Component
{
    public ?Room $room = null;
    public ?string $email = null;
    public ?string $winner = null;
    public bool $success = false;

    public function mount(): void
    {
        $this->room = Room::first();
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::unique('participants', 'email')->where('room_id', $this->room->id),
            ],
        ];

    }

    public function save(): void
    {
        $this->validate();
        Participant::create([
            'room_id' => $this->room->id,
            'email' => $this->email,
        ]);

        $this->success = true;
    }

    public function getWinner(): void
    {
        $winner = $this->room->participants()->inRandomOrder()->first();
        $this->winner = $winner->email;
    }

    #[Computed]
    public function participants()
    {
        return $this->room
            ->participants
            ->map(fn($participant) =>
            preg_replace('/(?<=.{2}).(?=.*@)/u', '*', $participant->email));
    }
    public function render(): View
    {
        return view('livewire.sprint-decision');
    }
}
