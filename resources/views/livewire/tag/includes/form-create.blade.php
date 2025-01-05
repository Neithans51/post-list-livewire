<div class="mt-5">
    <h1 class="mb-5 text-2xl font-bold">Crear Etiqueta</h1>
    <form wire:submit.prevent="store">
        <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
            <div class="col-span-2 flex flex-col items-start">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" wire:model="nombre"
                    placeholder="Ingrese el nombre de la etiqueta"
                    class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700 ">
                @error('nombre')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="md:col-span-2">
                <button type="submit"
                    class="py-3 text-base font-medium rounded text-white bg-blue-500 w-full hover:bg-blue-700 transition duration-300">Crear</button>
            </div>
        </div><!-- Grid End -->
    </form>
</div>
