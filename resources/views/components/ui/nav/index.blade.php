<nav class="bg-white fixed w-full z-20 top-0 inset-x-0 border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between h-16">

        <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0">
            <div class="w-7 h-7 grid grid-cols-2 grid-rows-2 gap-0.5">
                <span class="bg-red-500 rounded-sm"></span>
                <span class="bg-blue-500 rounded-sm"></span>
                <span class="bg-yellow-400 rounded-sm"></span>
                <span class="bg-green-500 rounded-sm"></span>
            </div>
            <div class="leading-tight">
                <p class="text-gray-400 text-[9px] font-medium uppercase tracking-widest">Sprint</p>
                <p class="text-gray-900 font-bold text-sm tracking-wide uppercase">Decision</p>
            </div>
        </a>

        <ul class="flex items-center gap-2">
            {{ $slot }}
        </ul>

    </div>
</nav>

<div class="h-16"></div>
