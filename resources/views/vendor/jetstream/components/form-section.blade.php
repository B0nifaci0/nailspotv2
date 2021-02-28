@props(['submit'])

<div>
    <form wire:submit.prevent="{{ $submit }}">
        {{ $form }}
        @if (isset($actions))
        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
            {{ $actions }}
        </div>
        @endif
    </form>
</div>