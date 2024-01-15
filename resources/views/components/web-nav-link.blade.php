<nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">SUSL Sports</span>
            <x-application-logo class="block h-10 w-auto fill-current text-gray-800 dark:text-gray-200" />
        </a>
    </div>
    <div class="flex lg:hidden">
        <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Open main menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>
    <div class="hidden lg:flex lg:gap-x-12">
        <x-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
            {{ __('Home') }}
        </x-nav-link>

        <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="center">
                <x-slot name="trigger">
                    <button class="inline-flex items-center border border-transparent text-sm leading-4  transition ease-in-out duration-150">
                        <div class="text-sm font-semibold leading-6 text-gray-900">Sports</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">

                    <x-dropdown-link href="/sports/tennis" wire:navigate>
                        Tennis
                    </x-dropdown-link>
                    <x-dropdown-link href="/sports/karate" wire:navigate>
                        Karate
                    </x-dropdown-link>
                    <x-dropdown-link href="/sports/badminton" wire:navigate>
                        Badminton
                    </x-dropdown-link>
                    <x-dropdown-link href="/sports/chess" wire:navigate>
                        Chess
                    </x-dropdown-link>
                    <x-dropdown-link href="/sports/carrom" wire:navigate>
                        Carrom
                    </x-dropdown-link>
                    <x-dropdown-link href="/sports/rugger" wire:navigate>
                        Rugger
                    </x-dropdown-link>
                    <x-dropdown-link href="/sports/cricket" wire:navigate>
                        Cricket
                    </x-dropdown-link>
                    <x-dropdown-link href="/sports/kabadi" wire:navigate>
                        Kabadi
                    </x-dropdown-link>
                    <x-dropdown-link href="/sports/football" wire:navigate>
                        Football
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
        </div>
        <x-nav-link :href="route('booking')" :active="request()->routeIs('booking')" wire:navigate>
            {{ __('Booking') }}
        </x-nav-link>
        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')" wire:navigate>
            {{ __('Contact') }}
        </x-nav-link>
    </div>
    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        @if (Route::has('login'))
        <livewire:welcome.navigation />
        @endif
    </div>
</nav>
