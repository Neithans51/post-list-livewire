<div>
    @php
        if ($editPostId) {
            $isChecked = in_array($tag['id'], $editPostEtiquetas);
        }
    @endphp

    @if ($editPostId)
        <input class="peer hidden" type="checkbox" value="{{ $tag['id'] }}" id="{{ $tag['nombre'] }}-{{ $tag['id'] }}"
            wire:model="editPostEtiquetas" {{ $isChecked ? 'checked' : '' }}>
        <label for="{{ $tag['nombre'] }}-{{ $tag['id'] }}"
            class="w-32 truncate font-sans font-semibold text-sm shadow-md no-underline p-2 rounded-full {{ $isChecked ? 'bg-blue-500 text-white' : 'bg-white text-black' }}   peer-checked:bg-blue-500 peer-checked:text-white">
            {{ $tag['nombre'] }}
        </label>
    @else
        <input class="peer hidden" type="checkbox" value="{{ $tag['id'] }}"
            id="{{ $tag['nombre'] }}-{{ $tag['id'] }}" wire:model="etiquetas">
        <label for="{{ $tag['nombre'] }}-{{ $tag['id'] }}"
            class="w-32 truncate font-sans font-semibold text-sm  shadow-md no-underline p-2 rounded-full bg-white text-black peer-checked:bg-blue-500 peer-checked:text-white">
            {{ $tag['nombre'] }}
        </label>
    @endif
</div>
