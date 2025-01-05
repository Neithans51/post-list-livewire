<div>
    @if ($editCategoryId)
        @include('livewire.tag.includes.alert')
    @endif
    @include('livewire.category.includes.modal')
    @include('livewire.category.includes.actions')
    <div class="grid grid-cols-3 justify-items-center gap-y-10 my-5">
        @foreach ($categories as $category)
            @include('livewire.category.includes.category-card')
        @endforeach
    </div>
    <div class="m-2">
        {{ $categories->links() }}
    </div>
</div>
