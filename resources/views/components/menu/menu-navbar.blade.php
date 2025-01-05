<nav class="bg-white shadow dark:bg-gray-800">
    <div class="container flex items-center justify-center p-6 mx-auto text-gray-600 capitalize dark:text-gray-300">
        <a href="{{ route('posts') }}" class="border-b-2 text-gray-800 dark:text-gray-200 mx-1.5 sm:mx-6 {{ Route::currentRouteName() == 'posts' ? 'border-blue-500' : 'border-transparent hover:border-blue-500' }}" wire:navigate>Publicaciones</a>

        <a href="{{ route('categories') }}" class="border-b-2 hover:text-gray-800 dark:hover:text-gray-200 mx-1.5 sm:mx-6 {{ Route::currentRouteName() == 'categories' ? 'border-blue-500' : 'border-transparent hover:border-blue-500' }}" wire:navigate>Categorías</a>

        <a href="{{ route('tags') }}" class="border-b-2 hover:text-gray-800 dark:hover:text-gray-200 mx-1.5 sm:mx-6 {{ Route::currentRouteName() == 'tags' ? 'border-blue-500' : 'border-transparent hover:border-blue-500' }}" wire:navigate>Etiquetas</a>
    </div>
</nav>
