<x-test-layout>
    <h2>Afdeling aanpassen</h2>


    <form method="post" action="{{ route('departments.update',['department' => $department]) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <div>
            <x-input-label for="name" :value="__('Naam')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $department->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="logo" :value="__('Logo')" />
            <x-text-input id="logo" name="logo" type="file" class="mt-1 block w-full" autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('logo')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-primary-button>
                <a href="{{ url()->previous() }}">
                {{ __('Back') }}
                </a>
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>

    </form>

</x-test-layout>