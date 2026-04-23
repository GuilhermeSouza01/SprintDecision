<div class="min-h-screen bg-slate-900 text-slate-100 p-6">
    <div class="max-w-3xl mx-auto">
        <div class="flex items-center gap-2 mb-6">
            <a href="{{ route('admin.sprint') }}" wire:navigate class="border border-slate-600 text-slate-200 px-3 py-1.5 rounded-lg text-sm flex items-center gap-1 hover:bg-slate-700">
                <x-heroicon-o-chevron-left class="w-4 h-4" />
            </a>
            <span class="text-sm text-slate-400">My sprints</span>
            <span class="text-sm text-slate-500">/</span>
            <span class="text-sm text-slate-200 font-medium">{{ $room->name }}</span>
        </div>

        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl font-bold flex items-center gap-3">
                    {{ $room->name }}
                    @if($room->status === 'open')
                    <span class="bg-green-500/50 text-white text-xs font-medium px-3 py-1 rounded-full flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        Open
                    </span>
                    @else
                    <span class="bg-slate-100/50 text-slate-300 text-xs font-medium px-3 py-1 rounded-full flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-slate-200"></span>
                        Closed
                    </span>
                    @endif
                </h1>
                <span class="inline-flex items-center gap-2 text-xs font-mono bg-slate-700 text-slate-300 px-3 py-1 rounded-md mt-2">
                    {{ $room->code }}
                </span>
            </div>
            @if($room->status === 'open')
            <button wire:click="closeRoom" class="border border-slate-600 text-slate-200 px-4 py-2 rounded-lg text-sm flex items-center gap-2 hover:bg-slate-700 cursor-pointer">
                <x-heroicon-o-x-circle class="w-4 h-4" />
                Close room
            </button>
            @endif
        </div>

        <div class="grid grid-cols-[200px_1fr] gap-5 mt-6 items-start">
            <div class="bg-slate-800 border border-slate-700 rounded-xl p-4">
                <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-4">PARTICIPANTS</h3>
                @forelse($this->participants as $participant)
                <div class="flex items-center gap-3 py-2">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-xs font-bold text-white
                        @switch(Str::upper(Str::substr($participant->user->name, 0, 2)))
                            @case('AL') bg-blue-500 @break
                            @case('BR') bg-purple-500 @break
                            @case('CM') bg-teal-500 @break
                            @case('DS') bg-amber-500 @break
                            @default bg-slate-500
                        @endswitch
                    ">
                        {{ Str::upper(Str::substr($participant->user->name, 0, 2)) }}
                    </div>
                    <span class="text-sm text-slate-200 flex-1">{{ $participant->user->name }}</span>
                    <span class="w-2 h-2 rounded-full bg-green-400"></span>
                </div>
                @empty
                <p class="text-sm text-slate-500">No participants</p>
                @endforelse
                @if($this->participants->count() > 0)
                <p class="text-xs text-slate-500 mt-3">{{ $this->participants->count() }} online</p>
                @endif
            </div>

            <div class="space-y-5">
                <div class="bg-slate-800 border border-slate-700 rounded-xl p-4">
                    <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-4">TASKS</h3>
                    <div class="flex flex-col gap-2">
                        @forelse($this->tasks as $task)
                        <div
                            wire:click="selectTask({{ $task->id }})"
                            @class([
                                'bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 cursor-pointer transition-colors',
                                'hover:border-slate-500 hover:bg-slate-600' => !$task->selected,
                                'border-sky-500 bg-sky-900/30' => $task->selected,
                            ])
                        >
                            <span class="text-sm font-semibold text-slate-100">{{ $task->title }}</span>
                            @if($task->user)
                            <span class="text-xs text-slate-400 mt-0.5 block">by {{ $task->user->name }}</span>
                            @endif
                        </div>
                        @empty
                        <p class="text-sm text-slate-500">No tasks yet</p>
                        @endforelse
                    </div>
                </div>

                <div class="bg-slate-800 border border-slate-700 rounded-xl p-4">
                    <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-4">DECISION</h3>
                    <div class="flex gap-2 mb-4">
                        <button wire:click="pickRandom" class="border border-slate-600 text-slate-200 px-4 py-2 rounded-lg text-sm flex items-center gap-2 hover:bg-slate-700">
                            <x-heroicon-o-squares-2x2 class="w-4 h-4" />
                            Pick random task
                        </button>
                        <button class="border border-slate-600 text-slate-200 px-4 py-2 rounded-lg text-sm flex items-center gap-2 hover:bg-slate-700">
                            <x-heroicon-o-plus class="w-4 h-4" />
                            Choose manually
                        </button>
                    </div>
                    @if($room->selectedTask)
                    <div class="border border-sky-500 bg-sky-900/20 rounded-lg p-4">
                        <span class="text-xs text-sky-400 uppercase tracking-widest mb-1 block">SELECTED TASK</span>
                        <span class="text-sm font-semibold text-slate-100">{{ $room->selectedTask->title }}</span>
                        @if($room->selectedTask->user)
                        <span class="text-xs text-slate-400 mt-0.5 block">by {{ $room->selectedTask->user->name }}</span>
                        @endif
                    </div>
                    @else
                    <div class="border border-dashed border-slate-600 rounded-lg py-6 text-center text-slate-500 text-sm">
                        No task selected yet
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
