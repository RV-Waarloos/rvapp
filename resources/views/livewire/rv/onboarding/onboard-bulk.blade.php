<div>
    <form wire:submit.prevent="submit">
        {{ $this->form }}

        @if ($attachment)
            <x-primary-button class="mt-5">
                Bewaren
            </x-primary-button>
        @endif
    </form>

    @if ($failureMessages != null)
        <div class="bg-red-100 rounded-lg py-5 px-6 mt-4 text-base text-blue-700">
            @foreach ($failureMessages as $failureMessage)
                <p> {{ $failureMessage }}
            @endforeach
        </div>
    @endif

</div>
