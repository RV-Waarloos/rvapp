<div class="flex">
    <form wire:submit.prevent="submit" class="min-w-fit">
        {{ $this->form }}

        @if ($accept)
            <x-primary-button class="mt-5">
                Bewaren
            </x-primary-button>
        @endif
    </form>
</div>
