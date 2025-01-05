<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy]
class CategoryCrud extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    #[Title('Lista de categorias')]

    public $show = false;
    public $nombre;

    public $editCategoryId;
    public $editCategoryNombre;

    protected $rules =
    [
        'nombre' => 'required|min:5|max:50',
        'editCategoryNombre' => 'required|min:5|max:50',
    ];

    protected $messages =
    [
        'nombre.required' => 'El campo nombre es obligatorio',
        'nombre.min:5' => 'El campo nombre debe contener mínimo 5 caracteres',
        'nombre.max:50' => 'El campo nombre debe contener máximo 50 caracteres',
        'editCategoryNombre.required' => 'El campo nombre es obligatorio',
        'editCategoryNombre.min:5' => 'El campo nombre debe contener mínimo 5 caracteres',
        'editCategoryNombre.max:50' => 'El campo nombre debe contener máximo 50 caracteres',
    ];

    protected $validationAttibutes =
    [
        'nombre' => 'Nombre de la categoría',
        'editCategoryNombre' => 'Nombre de la categoría',
    ];

    public function render()
    {
        return view('livewire.category.category-crud', [
            'categories' => Category::latest()->paginate(9),
        ]);
    }

    public function store()
    {
        $validateData = $this->validateOnly('nombre');

        Category::create([
            'nombre' => $validateData['nombre'],
        ]);

        $this->reset('nombre');

        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Categoría creada con éxito.',
        ]);
    }

    public function edit(Category $category)
    {
        $this->editCategoryId = $category->id;
        $this->editCategoryNombre = $category->nombre;
    }

    public function update(Category $category)
    {
        $validateData = $this->validateOnly('editCategoryNombre');

        $category->nombre = $validateData['editCategoryNombre'];
        $category->save();

        $this->cancelEditing();

        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Categoría editada con éxito.',
        ]);
    }

    public function cancelEditing()
    {
        $this->reset('editCategoryId', 'editCategoryNombre');
    }

    public function showModal($show)
    {
        $this->show = $show;
    }

    public function placeholder()
    {
        return view('components.skeletons.category-skeleton');
    }
}
