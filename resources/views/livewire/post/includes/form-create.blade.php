<div class="mt-5 w-96">
    <h1 class="mb-5 text-2xl font-bold">Crear Publicación</h1>
    <form wire:submit.prevent="store">
        <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
            <div class="col-span-2 flex flex-col items-start">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" wire:model="titulo"
                    placeholder="Ingrese el título de la publicación"
                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700 ">
                @error('titulo')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-span-2 flex flex-col items-start">
                <label for="categoria">Categoría:</label>
                <select id="categoria" name="categoria" wire:model="categoria"
                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700">
                    <option value="" disabled selected>Seleccione la categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['nombre'] }}</option>
                    @endforeach
                </select>
                @error('categoria')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="md:col-span-2 flex flex-col items-start">
                <textarea name="message" rows="5" cols="" placeholder="Ingrese el contenido de la publicación"
                    wire:model="contenido"
                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700"></textarea>
                @error('contenido')
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
            <div class="md:col-span-2">
                <button type="submit"
                    class="flex flex-row justify-center items-center py-3 text-base font-medium rounded text-white bg-blue-500 w-full hover:bg-blue-700 transition duration-300">
                    <span>Crear</span>
                    <svg wire:loading wire:target="store" class="w-8 h-8 ml-2 animate-spin" viewBox="0 0 24 24"
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
    </form>
</div>
