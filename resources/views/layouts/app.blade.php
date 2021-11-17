<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans text-gray-900 text-sm bg-gray-background">
    <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
        <a href="/">
            <img src="{{ asset('img/logo.svg') }}" alt="logo">
        </a>
        <div class="flex items-center mt-2 md:mt-0">
            @if (Route::has('login'))
                <div class="px-6 py-4">
                    @auth
                        <div class="flex items-center space-x-4">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log out') }}
                                </a>
                            </form>

                            <div x-data="{ isOpen: false }" class="relative">
                                <button 
                                    @click="isOpen = !isOpen">
                                <svg class="h-8 w-8 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                                    </svg>
                                    <div class="absolute rounded-full bg-red text-white text-xxs w-5 h-5 flex justify-center items-center border-2 -top-1 -right-1">8</div>
                                </button>
                                <ul x-show.transition.origin.top.left="isOpen" @click.away="isOpen = false"
                                    @keydown.escape.window="isOpen = false"
                                    class="absolute w-76 md:w-96 bg-white shadow-dialog rounded-xl text-sm text-left z-10 max-h-128 overflow-y-auto text-gray-700 md:-right-8 -right-28">
                                    <li>
                                        <a href="#" @click.prevent="
                                                    isOpen = false
                                                        $dispatch('custom-show-edit-modal') 
                                                    "
                                        class="hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in flex">
                                            <img src="https://www.gravatar.com/avatar/000000000000000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                                            <div class="ml-4">
                                                <div class="line-clamp-6">
                                                    <span class="font-semibold">최현승</span> commented on
                                                    <span class="font-semibold">This is my idea</span>
                                                    <span>"Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                        Aspernatur delectus nesciunt ullam saepe obcaecati pariatur illum, 
                                                        suscipit maiores iste! Repellendus hic aut temporibus laborum alias aliquid vero nisi adipisci eaque. 
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                        Aspernatur delectus nesciunt ullam saepe obcaecati pariatur illum, 
                                                        suscipit maiores iste! Repellendus hic aut temporibus laborum alias aliquid vero nisi adipisci eaque."</span>
                                                </div>
                                                <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" @click.prevent="
                                                    isOpen = false
                                                        $dispatch('custom-show-edit-modal') 
                                                    "
                                        class="hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in flex">
                                            <img src="https://www.gravatar.com/avatar/000000000000000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                                            <div class="ml-4">
                                                <div>
                                                    <span class="font-semibold">최현승</span> commented on
                                                    <span class="font-semibold">This is my idea</span>
                                                    <span>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur delectus nesciunt ullam saepe obcaecati pariatur illum, suscipit maiores iste! Repellendus hic aut temporibus laborum alias aliquid vero nisi adipisci eaque."</span>
                                                </div>
                                                <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" @click.prevent="
                                                    isOpen = false
                                                        $dispatch('custom-show-edit-modal') 
                                                    "
                                        class="hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in flex">
                                            <img src="https://www.gravatar.com/avatar/000000000000000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                                            <div class="ml-4">
                                                <div>
                                                    <span class="font-semibold">최현승</span> commented on
                                                    <span class="font-semibold">This is my idea</span>
                                                    <span>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur delectus nesciunt ullam saepe obcaecati pariatur illum, suscipit maiores iste! Repellendus hic aut temporibus laborum alias aliquid vero nisi adipisci eaque."</span>
                                                </div>
                                                <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="border-t border-gray-300 text-center">
                                        <button class="w-full hover:bg-gray-100 px-5 py-4 transition duration-150 ease-in block font-semibold">Mark all as read</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <a href="#">
                <img src="https://www.gravatar.com/avatar/000000000000000000000000000000000?d=mp" alt="avatar"
                    class="w-10 h-10 rounded-full">
            </a>
        </div>
    </header>

    <main class="container mx-auto flex flex-col md:flex-row" style="max-width: 1000px">
        <div class="w-70 md:mr-5 md:mx-0 mx-auto">
            <div class="border-2 border-blue rounded-xl mt-16 bg-white md:sticky top-8" style="
                        border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                        border-image-slice: 1;
                        background-image: linear-gradient(to bottom, #ffffff, #ffffff),
                        linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                        background-origin: border-box;
                        background-clip: content-box, border-box;
                    ">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">Add an idea</h3>
                    <p class="text-xs mt-4">
                        @auth
                            Let us know what you would like and we'll take a look over!!
                        @else
                            Please login to create an idea.
                        @endauth
                    </p>
                </div>

                @auth
                    <livewire:create-idea />
                @else
                    <div class="my-6 text-center">
                        <a href="{{ route('login') }}"
                            class="inline-block justify-center w-1/2 h-11 text-xs bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3 text-white">
                            <span class="ml-1">Login</span>
                        </a>

                        <a href="{{ route('register') }}"
                            class="inline-block justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-4">
                            Sign Up
                        </a>
                    </div>
                @endauth


            </div>
        </div>
        <div class="md:w-175 w-full px-2 md:px-0">
            <livewire:status-filters />

            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>
    </main>

    @if (session('success_message'))
        <x-notification-success :redirect="true" messageToDisplay="{{ session('success_message') }}" />
    @endif

    @stack('modals')

    @livewireScripts

</body>

</html>
