<nav x-data="{ open: false }" class="bg-orange-600 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                        <span class="ml-2 text-white font-bold text-lg">Mairie</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                @auth
                    @if(auth()->user()->isAdmin())
                        <div class="hidden space-x-4 sm:flex sm:ml-10">
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-white hover:bg-orange-700 px-3 py-2 rounded-md">
                                {{ __('Tableau de bord') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.agents.index')" :active="request()->routeIs('admin.agents.*')" class="text-white hover:bg-orange-700 px-3 py-2 rounded-md">
                                {{ __('Agents') }}
                            </x-nav-link>
                        </div>
                    @endif

                    @if(auth()->user()->isAgent() || auth()->user()->isAdmin())
                        <div class="hidden space-x-4 sm:flex sm:ml-4">
                            <x-nav-link :href="route('acte.index')" :active="request()->routeIs('acte.*')" class="text-white hover:bg-orange-700 px-3 py-2 rounded-md">
                                {{ __('Actes') }}
                            </x-nav-link>
                        </div>
                    @endif
                @endauth
            </div>

            <!-- Settings Dropdown -->
            @auth
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-orange-700 hover:bg-orange-800 focus:outline-none transition ease-in-out duration-150">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-white flex items-center justify-center text-orange-600 font-bold mr-2">
                                        {{ strtoupper(substr(Auth::user()->prenom, 0, 1)) }}
                                    </div>
                                    <span>{{ Auth::user()->prenom }}</span>
                                </div>
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="text-gray-700 hover:bg-orange-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                {{ __('Profil') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-gray-700 hover:bg-orange-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                    </svg>
                                    {{ __('Déconnexion') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endauth

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-orange-700 focus:outline-none focus:bg-orange-700 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-orange-600">
        <div class="pt-2 pb-3 space-y-1">
            @auth
                @if(auth()->user()->isAdmin())
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-white hover:bg-orange-700 px-3 py-2">
                        {{ __('Tableau de bord') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.agents.index')" :active="request()->routeIs('admin.agents.*')" class="text-white hover:bg-orange-700 px-3 py-2">
                        {{ __('Agents') }}
                    </x-responsive-nav-link>
                @endif

                @if(auth()->user()->isAgent() || auth()->user()->isAdmin())
                    <x-responsive-nav-link :href="route('acte.index')" :active="request()->routeIs('acte.*')" class="text-white hover:bg-orange-700 px-3 py-2">
                        {{ __('Actes') }}
                    </x-responsive-nav-link>
                @endif
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-3 border-t border-orange-700">
                <div class="flex items-center px-4">
                    <div class="h-10 w-10 rounded-full bg-white flex items-center justify-center text-orange-600 font-bold mr-3">
                        {{ strtoupper(substr(Auth::user()->prenom, 0, 1)) }}
                    </div>
                    <div>
                        <div class="font-medium text-white">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</div>
                        <div class="font-medium text-sm text-orange-100">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:bg-orange-700 px-3 py-2">
                        {{ __('Profil') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-white hover:bg-orange-700 px-3 py-2">
                            {{ __('Déconnexion') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>