<div class="flex">

    {{-- {{ $onboarding->firstname}}
    {{ $isOnboarding}} --}}


    <form wire:submit.prevent="submit" class="min-w-fit">
        {{ $this->form }}

        <x-primary-button class="mt-5">
            Bewaren
        </x-primary-button>

    </form>
</div>
