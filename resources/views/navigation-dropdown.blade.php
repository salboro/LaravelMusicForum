<div id="myHeader">
<nav x-data="{ open: false }" class="bg-gray-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-1 flex items-center">
                    <a href="/">
                        <b class="mr-3 text-3xl text-red-500">HowUMusic</b>
                    </a>

                    <a href="/">
                        <x-jet-application-mark/>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <a href="/"
                           @if (Request::path() === '/')
                           class="inline-flex items-center px-1 pt-1 border-b-2 border-red-500 text-xl font-medium leading-5 text-red-500 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
                           @else
                           class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-gray-400 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                            @endif
                        >
                            Главная
                        </a>
                        <a href="/articles/all"
                           @if (Request::path() === 'articles/all' or Request::path() === 'articles/guides' or Request::path() === 'articles/reviews' or Request::path() === 'articles/discourses')
                           class="ml-15 inline-flex items-center px-1 pt-1 border-b-2 border-red-500 text-xl font-medium leading-5 text-red-500 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
                           @else
                           class="ml-15 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-gray-400 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                            @endif
                        >
                            Статьи
                        </a>

                        <a href="/news"
                           @if (Request::path() === 'news')
                           class="ml-15 inline-flex items-center px-1 pt-1 border-b-2 border-red-500 text-xl font-medium leading-5 text-red-500 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
                           @else
                           class="ml-15 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-gray-400 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                            @endif
                        >
                            Новости
                        </a>
                </div>
            </div>
        <!-- Settings Dropdown -->
            @auth()
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex text-sm border-2 @if(Request::path() === 'user/profile') border-red-500 @else border-transparent @endif rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full object-cover"
                                     src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"/>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Управление аккаунтом
                            </div>

                            <x-jet-dropdown-link href="/user/profile">
                                Профиль
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="/user/{{ auth()->user()->id }}">
                                Портфолио
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="/user/api-tokens">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>


                        <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                    Выход
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
        {{--Registration and login--}}
            @else
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex border-b-2 @if((Request::path() === 'login') or (Request::path() === 'register')) border-red-500 text-red-500 @else hover:border-gray-700 hover:text-gray-700 text-gray-400 border-transparent @endif focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
                            >
                                <b>Вход</b>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <x-jet-dropdown-link href="/login">
                                Войти
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="/register">
                                Регистрация
                            </x-jet-dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            @endauth

        <!-- Hamburger -->
{{--            <div class="-mr-2 flex items-center sm:hidden">--}}
{{--                <button @click="open = ! open"--}}
{{--                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">--}}
{{--                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">--}}
{{--                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"--}}
{{--                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                              d="M4 6h16M4 12h16M4 18h16"/>--}}
{{--                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"--}}
{{--                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            </div>--}}
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="/dashboard" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>
    @auth()
        <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                             alt="{{ Auth::user()->name }}"/>
                    </div>

                    <div class="ml-3">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-jet-responsive-nav-link href="/user/profile" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="/user/api-tokens"
                                                   :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                    @endif

                <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    {{--                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())--}}
                    {{--                    <div class="border-t border-gray-200"></div>--}}

                    {{--                    <div class="block px-4 py-2 text-xs text-gray-400">--}}
                    {{--                        {{ __('Manage Team') }}--}}
                    {{--                    </div>--}}

                    {{--                    <!-- Team Settings -->--}}
                    {{--                    <x-jet-responsive-nav-link href="/teams/{{ Auth::user()->currentTeam->id }}" :active="request()->routeIs('teams.show')">--}}
                    {{--                        {{ __('Team Settings') }}--}}
                    {{--                    </x-jet-responsive-nav-link>--}}

                    {{--                    <x-jet-responsive-nav-link href="/teams/create" :active="request()->routeIs('teams.create')">--}}
                    {{--                        {{ __('Create New Team') }}--}}
                    {{--                    </x-jet-responsive-nav-link>--}}

                    {{--                    <div class="border-t border-gray-200"></div>--}}

                    {{--                    <!-- Team Switcher -->--}}
                    {{--                    <div class="block px-4 py-2 text-xs text-gray-400">--}}
                    {{--                        {{ __('Switch Teams') }}--}}
                    {{--                    </div>--}}

                    {{--                    @foreach (Auth::user()->allTeams() as $team)--}}
                    {{--                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />--}}
                    {{--                    @endforeach--}}
                    {{--                @endif--}}
                </div>
            </div>
        @endauth
    </div>
</nav>
</div>

