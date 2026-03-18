<div>
   <h1 class="text-2xl font-bold mb-4">Room Application :: {{ $room->name }}</h1>
    @if($success)
        <div class="flex flex-col items-center justify-center p-4 bg-green-100 rounded ">
            <h1 class="text-2xl font-bold">Thank you for your submission!</h1>
            <p class="mt-2">We will contact you soon.</p>
        </div>
    @else
        <form wire:submit="save">
            <x-ui.input
                wire:model="email"
                label="Enter your email"
                name="email"
            />
            @error('email')
                <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </div>
            @enderror
            <x-ui.button type="submit">
                Submit
            </x-ui.button>
        </form>
    @endif

    <div class="border border-gray-200 rounded-lg p-4 mt-4">
        <h3 class="text-lg font-medium text-gray-800 mb-4">Participants</h3>
        <ul class="divide-y divide-gray-100">
            @foreach($this->participants as $participant)
                <li class="py-2 px-2 hover:bg-gray-50">{{ $participant}}</li>
            @endforeach
        </ul>
    </div>

    @if($winner)
        <div class="flex flex-col items-center justify-center p-4 bg-blue-200 border border-b-blue-400 rounded">
            <h1 class="text-2xl font-bold">The winner is:</h1>
            <p class="mt-2">{{ $winner }}</p>
        </div>
    @endif
    <div>
        <x-ui.button type="button" wire:click="getWinner">
            Draw the winner
        </x-ui.button>
    </div>

</div>
