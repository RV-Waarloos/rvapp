<a 
:class="'{{ Route::currentRouteName() }}' == '{{ $route }}' ? 'bg-gray-200' : 'bg-transparent'"
class="px-4 py-2 mt-2 text-sm font-semibold rounded-lg 
       dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white 
       dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 
       hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" 
       href="{{ route($route) }}">
    {{ $label }}
</a>
