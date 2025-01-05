<div>
    @if ($editTagId)
        @include('livewire.tag.includes.alert')
    @endif
    @include('livewire.tag.includes.modal')
    @include('livewire.tag.includes.actions')
    <div class="w-full grid grid-cols-5 grid-flow-row auto-rows-max justify-items-center gap-y-10 my-5">
        @foreach ($tags as $tag)
            @include('livewire.tag.includes.tag-pill')
        @endforeach
    </div>
    <div class="m-2">
        {{ $tags->links() }}
    </div>
</div>
