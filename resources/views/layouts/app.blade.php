<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laracasts Voting</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <livewire:styles />

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans text-sm text-gray-900 bg-gray-background">
        <header class="flex flex-col items-center justify-between px-8 py-4 md:flex-row">
            <a href="#"><img src="{{ asset('img/logo.svg') }}" alt=""></a>
            <div class="flex items-center mt-2 md:mt-0">
                @if (Route::has('login'))
                    <div class="px-6 py-4">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline dark:text-gray-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <a href="#">
                    <img class="w-10 h-10 rounded-full" src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="">
                </a>
            </div>
        </header>

        <main class="container flex flex-col mx-auto md:flex-row max-w-custom">
            <div class="mx-auto md:mr-5 md:mx-0 w-70">
                <div
                    class="mt-16 bg-white border-2 md:sticky border-blue rounded-xl md:top-8"
                    style="border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0)); border-image-slice: 1; background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0)); background-origin: border-box; background-clip: content-box, border-box;"
                >
                    <div class="px-6 py-2 pt-6 text-center">
                        <h3 class="text-base font-semibold">Add an idea</h3>
                        <p class="mt-4 text-xs">Let us know what you would like and we'll take a look over!</p>
                    </div>

                    <form action="#" method="POST" class="px-4 py-6 space-y-4">
                        <div>
                            <input type="text" class="w-full px-4 py-2 text-sm bg-gray-100 border-none rounded-xl placeholder:gray-900" placeholder="Your idea">
                        </div>
                        <div>
                            <select name="category_add" id="category_add" class="w-full px-4 py-2 text-sm bg-gray-100 border-none rounded-xl"
                                <option value="Category One">Category One</option>
                                <option value="Category Two">Category Two</option>
                                <option value="Category Three">Category Three</option>
                                <option value="Category Four">Category Four</option>
                            </select>
                        </div>
                        <div>
                            <textarea name="idea" id="idea" cols="3" rows="4" class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none rounded-xl" placeholder="Describe your idea"></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" class="flex items-center justify-center w-full text-xs font-semibold transition duration-150 ease-in bg-gray-200 border border-gray-200 h-11 rounded-xl hover:border-gray-400">
                                <svg class="w-5 h-5 text-gray-600 -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>
                            <button type="submit" class="flex items-center justify-center w-full text-xs font-semibold text-white transition duration-150 ease-in border h-11 bg-blue rounded-xl border-blue hover:bg-blue-hover hover:border-blue-hover">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-full px-2 md:w-175 md:px-0">
                <nav class="items-center justify-between hidden text-xs md:flex">
                    <ul class="flex pb-3 space-x-10 font-semibold uppercase border-b-4">
                        <li><a href="#" class="pb-3 border-b-4 border-blue">All Ideas (87)</a></li>
                        <li><a href="#" class="pb-3 text-gray-400 transition duration-150 ease-in border-b-4 hover:border-blue">Considering (6)</a></li>
                        <li><a href="#" class="pb-3 text-gray-400 transition duration-150 ease-in border-b-4 hover:border-blue">In Progress (1)</a></li>
                    </ul>
                    
                    <ul class="flex pb-3 space-x-10 font-semibold uppercase border-b-4">
                        <li><a href="#" class="pb-3 text-gray-400 transition duration-150 ease-in border-b-4 hover:border-blue">Implemented (10)</a></li>
                        <li><a href="#" class="pb-3 text-gray-400 transition duration-150 ease-in border-b-4 hover:border-blue">Closed (5)</a></li>
                    </ul>
                </nav>

                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>
        </main>
        <livewire:scripts />
    </body>
</html>
