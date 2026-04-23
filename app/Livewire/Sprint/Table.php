<?php

namespace App\Livewire\Sprint;

use App\Models\Room;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportPagination\HandlesPagination;

class Table extends Component
{
    use HandlesPagination;
    #[Computed]
    #[On('room-created')]
    public function records(): LengthAwarePaginator
    {
        return Room::latest()
            ->paginate();
    }

    public function render(): View
    {
        return view('livewire.sprint.table');
    }
}
