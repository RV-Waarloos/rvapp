<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <x-slot name="hero">
        @include('layouts.hero1')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Dit is de publieke pagina van de RV Waarloos site
                </div>


                @if (session('statusflash'))
                    <div class="bg-blue-100 rounded-lg py-5 px-6 mb-4 text-base text-blue-700">
                        {{ session('statusflash') }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
