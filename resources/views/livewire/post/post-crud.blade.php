<div>
    @include('livewire.post.includes.modal')
    @include('livewire.post.includes.actions')
    <div class="grid grid-cols-3 justify-items-center gap-y-10 my-5">
        @foreach ($posts as $post)
            @include('livewire.post.includes.post-card')
        @endforeach
    </div>
    <div class="m-2">
        {{ $posts->links() }}
    </div>
</div>
