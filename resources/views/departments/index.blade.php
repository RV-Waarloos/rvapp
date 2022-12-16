<x-test-layout>
    <div class=" text-lg">
        Afdelingen
    </div>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($departments->count())
            <x-departments.grid :departments="$departments" />
            {{ $departments->links() }}
        @else
            <p class="text-center">Er zijn nog geen afdelingen gekend.</p>
        @endif
    </main>





</x-test-layout>
