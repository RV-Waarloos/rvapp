<div class="flex">
    <form wire:submit.prevent="submit" class="min-w-fit">
        {{ $this->form }}

        <x-primary-button class="mt-5">
            Bewaren
        </x-primary-button>

    </form>

    <x-howto.onboard-clubmember />

</div>
