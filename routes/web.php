<?php

use App\Livewire\PostCrud;
use App\Livewire\CategoryCrud;
use App\Livewire\TagCrud;
use Illuminate\Support\Facades\Route;

Route::get('/', PostCrud::class);

Route::get('publicaciones', PostCrud::class)
->name('posts');

Route::get('categorias', CategoryCrud::class)
->name('categories');

Route::get('etiquetas', TagCrud::class)
->name('tags');


