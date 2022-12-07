        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ml-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>Ledenbeheer</div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('clubmembers.list')">
                        Overzicht leden
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('onboard.clubmember')">
                        Nieuw clublid
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('onboard.clubmember')">
                        Nieuwe clubleden opladen
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('onboard.list')">
                        Overzicht registraties
                    </x-dropdown-link>

                </x-slot>
            </x-dropdown>
        </div>

        <!-- Responsive Settings Options -->
        <div :class="isOpen ? 'flex' : 'hidden'"
            class="hidden md:hidden flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
            <div class="pt-4 pb-1 border-t border-gray-200">

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('clubmembers.list')">
                        Overzicht
                    </x-response-nav-link>

                </div>
            </div>
        </div>
