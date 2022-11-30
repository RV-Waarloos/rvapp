<div class="bg-white" x-data="{ isOpen: false }">
    <nav class="container px-2 py-8 mx-auto md:flex md:justify-between md:items-center">
        <div class="flex items-center justify-between">
            {{-- logo --}}
            <x-navigation.navlogo />

            <!-- Mobile menu button -->
            <div @click="isOpen = !isOpen" class="flex md:hidden">
                <button type="button" class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                    aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path fill-rule="evenodd"
                            d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>


        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div :class="isOpen ? 'flex' : 'hidden'"
            class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">

             @auth
             <x-navigation.clubmembers-dropdown />
             <a class="text-gray-800 hover:text-indigo-400" href="#">Afdelingen</a>
             <a class="text-gray-800 hover:text-indigo-400" href="#features">Tap Calender</a>
             <a class="text-gray-800 hover:text-indigo-400" href="#blogs">Blogs</a>
             <a class="text-gray-800 hover:text-indigo-400" href="#contact">Contacteer Ons</a>
             @endauth


            <x-navigation.authenticate />
        </div>
    </nav>
</div>
