<nav class="bg-white fixed w-full z-20 top-0 inset-s-0 border-b border-b-gray-200 ">
    <div class="items-center justify-between flex w-full md:w-auto md:order-1" id="navbar-sticky">
        <ul
            class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white "
        >
            {{ $slot }}
        </ul>
    </div>
</nav>
