<div>
    @if ($open)
        <div
            x-data
            x-on:click.away="$wire.set('open', false)"
            x-on:keydown.escape.window="$wire.set('open', false)"
            x-show="$wire.$get('open')"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
        >
            <div
                x-on:click.stop
                class="bg-white dark:bg-slate-800 rounded-xl shadow-lg w-full max-w-md p-6"
            >
                <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-4">New sprint</h2>

                <form wire:submit="create">
                    <label class="block text-sm text-slate-500 mb-1">Name</label>
                    <input
                        wire:model="name"
                        type="text"
                        class="w-full border border-slate-200 dark:border-slate-600 rounded-lg px-3 py-2 text-sm bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500"
                        placeholder="Sprint name"
                    >
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                    <div class="flex justify-end gap-2 mt-6">
                        <button
                            type="button"
                            wire:click="$set('open', false)"
                            class="text-sm px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 cursor-pointer"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            class="text-sm font-bold px-4 py-2 rounded-lg bg-slate-900 dark:bg-[#4167cf] text-white dark:text-slate-200 hover:opacity-90 cursor-pointer"
                        >
                            Create room
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
