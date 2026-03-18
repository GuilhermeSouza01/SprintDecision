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
</div>
