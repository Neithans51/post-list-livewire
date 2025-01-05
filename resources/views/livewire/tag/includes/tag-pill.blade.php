<div class="relative">
    <button wire:key="{{ $tag->id }}" wire:click="edit({{ $tag->id }})"
        class="peer truncate w-32 h-10 py-2 px-4 shadow-md no-underline rounded-full {{ $editTagId == $tag->id ? 'bg-gray-200 h-14' : 'bg-blue-500' }} text-white font-sans font-semibold text-sm border-blue btn-primary hover:text-white hover:bg-blue-light focus:outline-none active:shadow-none mr-2">
        @if ($editTagId == $tag->id)
            <div class="flex flex-row">
                <input type="text" id="nombre" name="nombre" wire:model="editTagNombre"
                    wire:keydown.enter="update({{ $editTagId }})" placeholder="Ingrese el nombre de la etiqueta"
                    class="bg-transparent w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700 text-slate-600">
                <svg wire:loading wire:target="update" class="w-8 h-8 ml-2 animate-spin" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" fill="#3b82f6" stroke="#3b82f6"
                    stroke-width="0.00024000000000000003">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M12 3a9 9 0 0 1 9 9h-2a7 7 0 0 0-7-7V3z"></path>
                        </g>
                    </g>
                </svg>
            </div>
            @error('editTagNombre')
                <div class="absolute -top-9 left-1/2 -translate-x-1/2 z-10 whitespace-nowrap rounded bg-red-500 px-2 py-1 text-center text-sm text-white transition-all ease-out opacity-100"
                role="tooltip">{{ $message }}</div>
            @enderror
        @else
            {{ $tag->nombre }}
        @endif
    </button>
    @if ($editTagId == null)
        <div class="absolute -top-9 left-1/2 -translate-x-1/2 z-10 whitespace-nowrap rounded bg-neutral-950 px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100"
            role="tooltip">{{ $tag->nombre }}</div>
    @endif
</div>
