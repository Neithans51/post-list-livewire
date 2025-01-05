<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy]
class PostCrud extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    #[Title('Lista de publicaciones')]

    public $show = false;
    public $titulo;
    public $categoria = '';
    public $contenido;
    public $etiquetas = [];

    public $editPostId;
    public $editPostTitulo;
    public $editPostCategoria;
    public $editPostContenido;
    public $editPostEtiquetas = [];

    protected $rules =
    [
        'titulo' => 'required|min:5|max:100',
        'categoria' => 'required|exists:categories,id',
        'contenido' => 'required|min:20|max:500',
        'editPostTitulo' => 'required|min:5|max:100',
        'editPostCategoria' => 'required|exists:categories,id',
        'editPostContenido' => 'required|min:50|max:500',
    ];

    protected $messages =
    [
        'titulo.required' => 'El campo titulo es obligatorio',
        'titulo.min:5' => 'El campo titulo debe contener mínimo 5 caracteres',
        'titulo.max:100' => 'El campo titulo debe contener máximo 100 caracteres',
        'categoria.required' => 'El campo categoria es obligatorio',
        'categoria.exists' => 'La categoría seleccionada no existe en la base de datos',
        'contenido.required' => 'El campo contenido es obligatorio',
        'contenido.min:50' => 'El campo contenido debe contener mínimo 50 caracteres',
        'contenido.max:500' => 'El campo contenido debe contener máximo 500 caracteres',
        'editPostTitulo.required' => 'El campo título es obligatorio',
        'editPostTitulo.min:5' => 'El campo título debe contener mínimo 5 caracteres',
        'editPostTitulo.max:100' => 'El campo título debe contener máximo 100 caracteres',
        'editPostCategoria.required' => 'El campo categoria es obligatorio',
        'editPostCategoria.exists' => 'La categoría seleccionada no existe en la base de datos',
        'editPostContenido.required' => 'El campo contenido es obligatorio',
        'editPostContenido.min:50' => 'El campo contenido debe contener mínimo 50 caracteres',
        'editPostContenido.max:500' => 'El campo contenido debe contener máximo 500 caracteres',
    ];

    protected $validationAttibutes =
    [
        'titulo' => 'Título de la publicación',
        'categoria' => 'Categoría de la publicación',
        'contenido' => 'Contenido de la publicación',
        'editPostTitulo' => 'Título de la publicación',
        'editPostCategoria' => 'Categoría de la publicación',
        'editPostContenido' => 'Contenido de la publicación',
    ];

    public function render()
    {
        return view('livewire.post.post-crud', [
            'posts' => Post::latest()->paginate(9),
            'categories' => Category::all()->map(function ($category) {
                return [
                    'id' => $category->id,
                    'nombre' => $category->nombre,
                ];
            }),
            'tags' => Tag::all()->map(function ($tag) {
                return [
                    'id' => $tag->id,
                    'nombre' => $tag->nombre,
                ];
            })
        ]);
    }

    public function store()
    {
        $validatedData = $this->validateMultiple(['titulo', 'categoria', 'contenido']);

        $post = Post::create([
            'titulo' => $validatedData['titulo'],
            'category_id' => $validatedData['categoria'],
            'contenido' => $validatedData['contenido'],
        ]);

        $post->tags()->sync($this->etiquetas);

        $this->reset('titulo', 'categoria', 'contenido', 'etiquetas');

        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Publicación creada con éxito.',
        ]);
    }

    public function showModal($show)
    {
        $this->show = $show;
    }

    public function placeholder()
    {
        return view('components.skeletons.post-skeleton');
    }

    public function validateMultiple($fields)
    {
        $validated = [];

        foreach($fields as $field)
        {
            $validatedData = $this->validateOnly($field);
            $validated[key($validatedData)] = current($validatedData);
        }

        return $validated;
    }

    public function edit(Post $post)
    {
        $this->cancelEditing();

        $this->editPostId = $post->id;
        $this->editPostTitulo = $post->titulo;
        $this->editPostCategoria = $post->category->id;
        $this->editPostContenido = $post->contenido;

        foreach($post->tags as $tag)
        {
            array_push($this->editPostEtiquetas, $tag->id);
        }
    }

    public function update(Post $post)
    {
        $validatedData = $this->validateMultiple(['editPostTitulo', 'editPostCategoria', 'editPostContenido']);

        $post->titulo = $validatedData['editPostTitulo'];
        $post->category_id = $validatedData['editPostCategoria'];
        $post->contenido = $validatedData['editPostContenido'];
        $post->tags()->sync($this->editPostEtiquetas);
        $post->save();

        $this->cancelEditing();

        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Publicación editada con éxito.',
        ]);
    }

    public function cancelEditing()
    {
        $this->reset('editPostId','editPostTitulo', 'editPostCategoria', 'editPostContenido', 'editPostEtiquetas');
    }
}
