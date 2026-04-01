@props(['route' => '', 'button' => false])

<li>
    @if($button)
        <form method="POST" action="{{ route($route) }}">
            @csrf
            <button
                type="submit"
                class="px-4 py-2 text-sm font-medium rounded-md transition-all duration-200 bg-[#4167cf] hover:bg-[#3754be] text-white hover:text-blue-50 cursor-pointer"
            >
                {{ $slot }}
            </button>
        </form>
    @else
    <a
        href="{{ route($route) }}"
        wire:navigate
        @class([
            'relative px-4 py-2 text-sm font-medium rounded-md transition-all duration-200',
            'text-sky-700 hover:text-sky-900 hover:bg-sky-400/10 ' => !request()->routeIs($route),
            'text-sky-700 bg-sky-400/10 hover:text-sky-300' => request()->routeIs($route),
        ])
    >
    {{ $slot }}

        @if(request()->routeIs($route))
            <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 w-1 h-1 rounded-full bg-sky-400"></span>
        @endif
        </a>
    @endif
</li>
