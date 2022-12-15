<x-test-layout>
    <div>
        <div class="mb-6">
            <label class="block">
                <span class="text-gray-700">Description</span>
                <textarea id="editor" class="block w-full mt-1 rounded-md" name="description" rows="3"></textarea>
            </label>
            @error('description')
                <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
</x-test-layout>
