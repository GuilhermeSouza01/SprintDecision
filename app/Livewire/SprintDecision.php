<?php

namespace App\Livewire;

use App\Models\Participant;
use App\Models\Room;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SprintDecision extends Component
{
    public ?Room $room = null;
    public ?string $email = null;

    public bool $success = false;

    public function mount(): void
    {
        $this->room = Room::inRandomOrder()->first();
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
    public function render(): View
    {
        return view('livewire.sprint-decision');
    }
}
