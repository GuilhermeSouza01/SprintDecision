@props(['type' => 'button'])
<div>
<button type="{{ $type }}" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded mt-4 w-full cursor-pointer" >{{$slot}}</button>
</div>
