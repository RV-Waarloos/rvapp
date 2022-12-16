@props(['departments'])


@if ($departments->count())
    <div class="lg:grid lg:grid-cols-6">

        @foreach ($departments as $department)
            <x-departments.card 
            :department="$department"
            class="col-span-2"
            {{-- class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" --}}
            
            />
        @endforeach
    </div>
    {{-- <x-post-card
                :post="$post"
                class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"
            /> --}}



@endif
