@props(['type' => 'button'])
<div>
<button {{ $attributes->merge(['type' => $type, 'class' => 'bg-[#4167cf] hover:bg-[#3754be] transition duration-300 text-white font-bold py-2 px-4 rounded mt-4 w-full cursor-pointer']) }}>{{ $slot }}</button>
</div>
