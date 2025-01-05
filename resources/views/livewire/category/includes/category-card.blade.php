<div wire:key="{{ $category->id }}" wire:click="edit({{ $category->id }})"
    class="shadow-md cursor-pointer p-3 flex justify-between items-center w-72 bg-clip-border rounded-md mx-4 mt-4 hover:shadow-xl">
    <div class="flex items-center">
        @if ($editCategoryId == $category->id)
            <div class="flex flex-col">
                <div class="flex flex-row justify-center items-center">
                    <input type="text" id="nombre" name="nombre" wire:model="editCategoryNombre"
                        wire:keydown.enter="update({{ $editCategoryId }})"
                        placeholder="Ingrese el nombre de la etiqueta"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700 text-slate-600">
                    <svg wire:loading wire:target="update" class="w-8 h-8 ml-2 animate-spin" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#3b82f6" stroke="#3b82f6"
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
                @error('editCategoryNombre')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        @else
            <span class="ml-3 font-medium">{{ $category->nombre }}</span>
        @endif
    </div>
</div>
