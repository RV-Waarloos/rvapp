@props(['department'])




<article class="flex m-2 ">
    <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg">
        {{-- <img class=" w-full h-95 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg" --}}
        <img class=" p-16 h-full w-full  rounded-full"
            src="{{ $department->getFirstMediaUrl('department-logo','thumb') }}" alt="" />
            {{-- src="{{ Vite::asset('resources/images/chalet.jpg') }}" alt="" /> --}}
        <div class="p-6 flex flex-col justify-start">
            <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $department->name }}</h5>
            <p class="text-gray-700 text-base mb-4">
                This is a wider card with supporting text below as a natural lead-in to additional content. This content
                is a little bit longer.
            </p>
            <a class="px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                href=" {{ route('departments.edit', ['department' => $department]) }} ">
                Details
            </a>
        </div>
    </div>
</article>



