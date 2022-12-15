<div>
    @if ($action === 'show')
        Title: {{ $departmentpage->title }}
        <div>
            {!! $departmentpage->pagecontent !!}
        </div>
    @endif

    @if ($action === 'edit')
        <div>
            {{-- <form wire:submit.prevent="submit" action="{{ route('departmentpage.save', [$department, $departmentpage]) }}" method="POST"> --}}
                <form wire:submit.prevent="submit" method="POST">
                <div class="mb-6">
                    <label wire:ignore class="block">
                        <span class="text-gray-700">Description</span>
                        <textarea wire:model="message" id="message" class="block w-full mt-1 rounded-md" name="message" rows="6">
                        {!! $departmentpage->pagecontent !!}
                    </textarea>
                    </label>
                    @error('description')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                    <p><input type="submit" value="Submit"></p>
                </div>
            </form>
        </div>
        @push('scripts')
            <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
            <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/translations/nl.js"></script>            
            <script>
                ClassicEditor
                    .create(document.querySelector('#message'), {
                        language: 'nl'
                    })
                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            @this.set('message', editor.getData());
                        })
                    })
                    .catch(error => {
                        console.error(error);
                    });
            </script>
        @endpush
    @endif

</div>
