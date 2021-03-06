<x-app-layout>
    {{-- start filters --}}
    <div class="flex flex-col space-y-3 md:space-x-6 md:flex-row filters md:space-y-0">
        <div class="w-full md:w-1/3">
            <select name="category" id="category" class="w-full px-4 py-2 border-none rounded-xl">
                <option value="Category One">Category One</option>
                <option value="Category Two">Category Two</option>
                <option value="Category Three">Category Three</option>
                <option value="Category Four">Category Four</option>
            </select>
        </div>

        <div class="w-full md:w-1/3">
            <select name="other_filters" id="other_filters" class="w-full px-4 py-2 border-none rounded-xl">
                <option value="Filter One">Filter One</option>
                <option value="Filter Two">Filter Two</option>
                <option value="Filter Three">Filter Three</option>
                <option value="Filter Four">Filter Four</option>
            </select>
        </div>

        <div class="relative w-full md:w-2/3">
            <input type="search" placeholder="Find an idea" class="w-full px-4 py-2 pl-8 placeholder-gray-900 bg-white border-none rounded-xl">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>
    {{-- end filters --}}

    {{-- start ideas container --}}
    <div class="my-6 space-y-6 ideas-container">
        @foreach ($ideas as $idea)
            <div
                x-data
                x-on:click=
                    "const clicked = $event.target
                    const target = clicked.tagName.toLowerCase(); 
                    const ignores = ['button', 'svg', 'path', 'a'];
                    if (!ignores.includes(target)) { clicked.closest('.idea-container').querySelector('.idea-link').click() }
                    "
                class="flex transition duration-150 ease-in bg-white cursor-pointer idea-container hover:shadow-card rounded-xl">
                <div class="hidden px-5 py-8 border-r border-gray-100 md:block">
                    <div class="text-center">
                        <div class="text-2xl font-semibold">12</div>
                        <div class="text-gray-500">Votes</div>
                    </div>

                    <div class="mt-8">
                        <button class="w-20 px-4 py-3 font-bold uppercase transition duration-150 ease-in bg-gray-200 border border-gray-200 hover:border-gray-400 text-xxs rounded-xl">Vote</button>
                    </div>
                </div>
                <div class="flex flex-col flex-1 px-2 py-6 md:flex-row">
                    <div class="flex-none mx-4 md:mx-0">
                        <a href="#">
                            <img src="{{ $idea->user->avatar }}" class="w-14 h-14 rounded-xl" alt="avatar">
                        </a>
                    </div>
                    <div class="w-full mx-4">
                        <h4 class="mt-2 text-xl font-semibold md:mt-0">
                            <a href="{{ route('idea.show', $idea) }}" class="idea-link hover:underline">{{ $idea->title }}</a>
                        </h4>
                        <div class="mt-3 text-gray-600 line-clamp-3">
                            {{ $idea->description }}
                        </div>

                        <div class="flex flex-col justify-between mt-6 md:items-center md:flex-row">
                            <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                                <div>{{ $idea->created_at->diffForHumans() }}</div>
                                <div>&bull;</div>
                                <div>{{ $idea->category->name }}</div>
                                <div>&bull;</div>
                                <div class="text-gray-900">3 Comments</div>
                            </div>
                            <div class="flex items-center mt-4 space-x-2 md:mt-0" x-data="{ isOpen: false }">
                                <div class="px-4 py-2 font-bold leading-none text-center uppercase {{ $idea->status->classes }} rounded-full text-xxs w-28 h-7">{{ $idea->status->name }}</div>
                                    <button 
                                        x-on:click="isOpen = !isOpen"
                                        class="px-4 py-2 text-gray-400 transition duration-150 ease-in bg-gray-100 border rounded-full hover:bg-gray-200 h-7">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 42" stroke="currentColor" stroke-width="3.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                        </svg>
                                        <ul 
                                            x-cloak
                                            x-show="isOpen"
                                            x-transition.origin.top.left
                                            x-on:click.away="isOpen = false" 
                                            x-on:keydown.window.escape="isOpen = false"
                                            class="absolute py-3 ml-8 font-semibold text-left text-gray-900 bg-white w-44 hover:shadow-dialog rounded-xl">
                                            <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                            <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Delete Post</a></li>
                                        </ul>
                                    </button>
                            </div>
                            <div class="flex mt-4 md:hidden md:mt-0">
                                <div class="h-10 px-4 py-2 pr-8 text-center bg-gray-100 rounded-xl">
                                    <div class="text-sm font-bold leading-none">12</div>
                                    <div class="font-semibold leading-none text-gray-400 text-xxs">Votes</div>
                                </div>
                                <button class="w-20 px-4 py-3 -mx-5 font-bold text-black uppercase transition duration-150 ease-in bg-gray-200 border border-gray-200 hover:border-gray-400 text-xxs rounded-xl">Voted</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- end ideas container --}}
    
    <div class="my-8">
        {{ $ideas->links() }}    
    </div>
    
</x-app-layout>
