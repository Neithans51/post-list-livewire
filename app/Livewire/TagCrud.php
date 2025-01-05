<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy]
class TagCrud extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    #[Title('Lista de etiquetas')]

    public $show = false;

    public $nombre;
    public $editTagId;
    public $editTagNombre;

    protected $rules =
    [
        'nombre' => 'required|min:5|max:50',
        'editTagNombre' => 'required|min:5|max:50',
    ];

    protected $messages =
    [
        'nombre.required' => 'El campo nombre es obligatorio',
        'nombre.min:5' => 'El campo nombre debe contener mínimo 5 caracteres',
        'nombre.max:50' => 'El campo nombre debe contener máximo 50 caracteres',
        'editTagNombre.required' => 'El campo nombre es obligatorio',
        'editTagNombre.min:5' => 'El campo nombre debe contener mínimo 5 caracteres',
        'editTagNombre.max:50' => 'El campo nombre debe contener máximo 50 caracteres',
    ];

    protected $validationAttibutes =
    [
        'nombre' => 'Nombre de la etiqueta',
        'editTagNombre' => 'Nombre de la etiqueta',
    ];

    public function render()
    {
        return view('livewire.tag.tag-crud', [
            'tags' => Tag::latest()->paginate(20),
        ]);
    }

    public function store()
    {
        $validateData = $this->validateOnly('nombre');

        Tag::create([
            'nombre' => $validateData['nombre'],
        ]);

        $this->reset('nombre');

        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Etiqueta creada con éxito.',
        ]);
    }

    public function edit(Tag $tag)
    {
        $this->editTagId = $tag->id;
        $this->editTagNombre = $tag->nombre;
    }

    public function update(Tag $tag)
    {
        $validateData = $this->validateOnly('editTagNombre');

        $tag->nombre = $validateData['editTagNombre'];
        $tag->save();

        $this->cancelEditing();

        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Etiqueta editada con éxito.',
        ]);
    }

    public function cancelEditing()
    {
        $this->reset('editTagId', 'editTagNombre');
    }

    public function showModal($show)
    {
        $this->show = $show;
    }

    public function placeholder()
    {
        return view('components.skeletons.tag-skeleton');
    }
}
