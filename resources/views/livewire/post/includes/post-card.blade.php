<div wire:key="{{ $post->id }}"
    class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96 cursor-pointer hover:shadow-xl">
    @if ($editPostId == $post->id)
        <div class="p-6">
            <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
                <div class="col-span-2 flex flex-col items-start">
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" wire:model="editPostTitulo"
                        placeholder="Ingrese el título de la publicación"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700 ">
                    @error('editPostTitulo')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-span-2 flex flex-col items-start">
                    <label for="categoria">Categoría:</label>
                    <select id="categoria" name="categoria" wire:model="editPostCategoria"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700">
                        <option value="" disabled selected>Seleccione la categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}"
                                {{ $category['id'] == $editPostCategoria ?: 'selected' }}>{{ $category['nombre'] }}
                            </option>
                        @endforeach
                    </select>
                    @error('editPostCategoria')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="md:col-span-2 flex flex-col items-start">
                    <textarea name="contenido" rows="5" cols="" placeholder="Ingrese el contenido de la publicación"
                        wire:model="editPostContenido"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700"></textarea>
                    @error('editPostContenido')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="md:col-span-2 flex flex-col gap-y-2">
                    <span class="text-start">Seleccione las etiquetas de la publicación:</span>
                    <div class=" grid grid-cols-3 overflow-y-scroll gap-y-6 py-2">
                        @foreach ($tags as $tag)
                            @include('livewire.post.includes.pill-checkbox')
                        @endforeach
                    </div>
                </div>
                <button wire:click="update({{ $editPostId }})"
                    class="md:col-span-2 flex flex-row justify-center items-center py-3 text-base font-medium rounded text-white bg-blue-500 w-full hover:bg-blue-700 transition duration-300">
                    <span>Editar</span>
                    <svg wire:loading wire:target="update" class="w-8 h-8 ml-2 animate-spin" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" fill="#ffffff">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M12 3a9 9 0 0 1 9 9h-2a7 7 0 0 0-7-7V3z"></path>
                            </g>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
    @else
        <div wire:click="edit({{ $post->id }})">
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <span
                        class="py-1 px-2 no-underline rounded-full bg-blue-200 border-blue btn-primary block font-sans text-base antialiased font-medium leading-relaxed text-blue-800">
                        {{ $post->category->nombre }}
                    </span>
                    <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                        {{ $post->created_at->monthName }} {{ $post->created_at->format('m,Y') }}
                    </p>
                </div>
                <p class="truncate block font-sans text-base antialiased font-bold leading-relaxed text-blue-gray-900">
                    {{ $post->titulo }}
                </p>
                <p class="truncate block font-sans text-sm antialiased font-normal leading-normal text-gray-700 opacity-75">
                    {{ $post->contenido }}
                </p>
            </div>
            <div class="p-6 justify-center items-center grid-cols-4 grid gap-2">
                @foreach ($post->tags as $tag)
                    <span
                        class="peer truncate w-20 py-1 px-2 no-underline rounded-full bg-blue-500 border-blue btn-primary block font-sans text-base antialiased font-medium leading-relaxed text-white">
                        {{ $tag->nombre }}
                    </span>
                @endforeach
            </div>
        </div>
    @endif
</div>
