<x-test-layout>
    <h2>Afdelingen</h2>

    <div class="flex flex-wrap">
        @if ($departments->count())
            @foreach ($departments as $department)
                <x-departments.card :department="$department" />
            @endforeach
            {{ $departments->links() }}
        @else
            <p class="text-center">Er zijn nog geen afdelingen gekend.</p>
        @endif
    </div>
</x-test-layout>
